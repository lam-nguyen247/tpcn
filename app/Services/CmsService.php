<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CmsService
{
    /**
     * Generate data-cms attribute for all img and child tag contains text.
     *
     * @param $fileName $fileName.blade.php | null: all file *.blade.php
     */
    public function generate($fileName)
    {
        $fileList = new RecursiveDirectoryIterator('resources/views/home');

        foreach (new RecursiveIteratorIterator($fileList) as $file) {
            if ($file->getExtension() == 'php') {
                if ($fileName) {
                    $path = $this->resolvePath($fileName);
                    $shortFileName = $fileName;
                } else {
                    $path = $file;
                    $shortFileName = Str::of($path)->replace('resources/views/home', '')
                        ->replace('\\', '/')->ltrim('/')->replace('.blade.php', '');
                }

                $hasDoctype = $this->beforeGenerate($path);
                $domDocument = new DOMDocument();
                @$domDocument->loadHTMLFile($path);
                $domXPath = new DOMXPath($domDocument);

                $dataCmsList = $domXPath->query("//*[@data-cms]");
                foreach ($dataCmsList as $dataCms) {
                    $dataCms->removeAttribute('data-cms');
                }

                $tagList = $domXPath->query("//body//*");
                $fileNameSlug = Str::slug(str_replace('/', '-', $shortFileName));
                foreach ($tagList as $index => $tag) {
                    if ($tag->hasChildNodes()) {
                        if ($tag->firstChild->nodeType === 3 && $tag->childNodes->length === 1 && !empty(trim($tag->nodeValue))) {
                            if ('a' === $tag->nodeName) {
                                if (!Str::startsWith($tag->getAttribute('href'), "#")
                                    && !Str::startsWith($tag->getAttribute('href'), "/")
                                    && !Str::startsWith($tag->getAttribute('href'), "http")) {
                                    $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
                                }
                            } else {
                                $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
                            }
                        }
                    } else if ('img' === $tag->nodeName) {
                        $tag->setAttribute('data-cms', $fileNameSlug . '-' . $index);
                    }
                }

                $this->afterGenerate($path, $domDocument->saveHTML(), $hasDoctype);

                if ($fileName) {
                    break;
                }
            }
        }
    }

    /**
     * Validate all file in resources/views/home/*.blade.php
     *
     * @param $fileName
     * @return Collection duplicate data-cms
     */
    public function validate($fileName)
    {
        $fileList = new RecursiveDirectoryIterator('resources/views/home');
        $dataCmsValueList = collect();
        $textNoTagList = collect();

        foreach (new RecursiveIteratorIterator($fileList) as $file) {
            if ($file->getExtension() == 'php') {
                $domDocument = new DOMDocument();
                if ($fileName) {
                    $content = $this->normalizeContent($this->resolvePath($fileName));
                } else {
                    $content = $this->normalizeContent($file);
                }

                @$domDocument->loadHTML($content);
                $domXPath = new DOMXPath($domDocument);
                $dataCmsList = $domXPath->query("//*[@data-cms]");
                foreach ($dataCmsList as $dataCms) {
                    $dataCmsValueList->push($dataCms->getAttribute('data-cms'));
                }

                $tagList = $domXPath->query("//body//*");
                foreach ($tagList as $index => $tag) {
                    if ($tag->hasChildNodes() && $tag->firstChild->nodeType === 3 && $tag->childNodes->length > 1) {
                        foreach ($tag->childNodes as $childNode) {
                            if (!$childNode->hasChildNodes() && !empty(trim($childNode->nodeValue))
                                && !Str::startsWith(trim($childNode->nodeValue), '@')) {
                                $textNoTagList->push(Str::limit(trim($childNode->nodeValue), 30, ''));
                            }
                        }
                    }
                }

                if ($fileName) {
                    break;
                }
            }
        }

        return collect([
            'duplicate' => $dataCmsValueList->duplicates()->unique()->flatten(),
            'noTag' => $textNoTagList->unique()->flatten()
        ]);
    }

    private function resolvePath($fileName)
    {
        return 'resources/views/home/' . $fileName . '.blade.php';
    }

    private function beforeGenerate(string $path)
    {
        $content = file_get_contents($path);
        $content = Str::of($content)
            ->replaceMatches('/<br(\s+)?\/?>/i', 'brTagCms')
            ->replace('@cms', '<style>@cms</style>')
            ->replace('@src', 'at-src-cms')
            ->replace('@load', 'at-load-cms')
            ->replace('@scroll', 'at-scroll-cms')
            ->replace('&nbsp;', '');
        $hasDoctype = Str::of($content)->lower()->startsWith('<!doctype');

        if (!$hasDoctype) {
            $content = "<!DOCTYPE html><html lang=\"vi\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"></head><body>" . $content;
        } else {
            $content = Str::of($content)->replace("<head>", "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">");
        }
        file_put_contents($path, $content);

        return $hasDoctype;
    }

    private function afterGenerate(string $path, $content, $hasDoctype)
    {
        if (!$hasDoctype) {
            $content = Str::of($content)
                ->replace("<!DOCTYPE html>\n<html lang=\"vi\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"></head><body>", "")
                ->replace("\n</body></html>", "");
        } else {
            $content = Str::of($content)->replace("<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">", "<head>");
        }

        $content = Str::of($content)
            ->replace('%7B%7B', '{{')->replace('%7D%7D', '}}')
            ->replace('-&gt;', '->')->replace('%24', '$')
            ->replace('brTagCms', '<br>')
            ->replace('<style>@cms</style>', '@cms')
            ->replace('at-src-cms', '@src')
            ->replace('at-load-cms', '@load')
            ->replace('at-scroll-cms', '@scroll');
        file_put_contents($path, $content);
    }

    private function normalizeContent(string $path)
    {
        $content = file_get_contents($path);
        $hasDoctype = Str::of($content)->lower()->startsWith('<!doctype');
        if (!$hasDoctype) {
            $content = "<!DOCTYPE html><html lang=\"vi\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\"></head><body>" . $content;
        } else {
            $content = Str::of($content)->replace("<head>", "<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">");
        }

        $content = preg_replace('/<br(\s+)?\/?>/i', '', $content);
        $content = preg_replace('{{{--.+--}}}', '', $content);
        return $content;
    }
}
