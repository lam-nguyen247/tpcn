<?php

namespace App\Services;

use DOMDocument;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function getMenuList($content)
    {
        $menuList = collect();
        $domDocument = new DOMDocument();
        @$domDocument->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), 8192 | 4);

        $h3TagList = $domDocument->getElementsByTagName('h3');
        foreach ($h3TagList as $h3Tag) {
            $menuList->put($h3Tag->getAttribute('id'), $h3Tag->textContent);
        }

        return $menuList;
    }

    /**
     * Transform all html content has external image or base64 to internal.
     *
     * @param $content
     * @param string $path required
     * @param int $width optional
     * @return string
     */
    public function transformAll($content, string $path, $width = 1024)
    {
        $domDocument = new DOMDocument();
        @$domDocument->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), 8192 | 4);

        $h3TagList = $domDocument->getElementsByTagName('h3');
        foreach ($h3TagList as $h3Tag) {
            $h3Tag->setAttribute('id', Str::slug($h3Tag->textContent));
        }

        $imgTagList = $domDocument->getElementsByTagName('img');
        foreach ($imgTagList as $imgTag) {
            $src = $imgTag->getAttribute('src');
            $imgTag->setAttribute('loading', 'lazy');
            if (Str::startsWith($src, 'http')) {
                try {
                    $originalFileName = head(explode('?', last(explode('/', $src))));
                    $fileName = $this->getFileName($originalFileName);
                    $imgTag->setAttribute('src', $this->store(file_get_contents($src), $path, $fileName, $width));
                } catch (Exception $e) {
                    Log::error('ImageService.transformAll() Cannot transform url ' . $src);
                }
            } else if (Str::startsWith($src, 'data:image')) {
                $imgTag->setAttribute('src', $this->transform($src, $path, $imgTag->getAttribute('data-filename'), $width));
            }
        }

        return $domDocument->saveHTML();
    }

    /**
     * Transform base64 to image.
     *
     * @param string $base64 required
     * @param string $path required
     * @param null $fileName optional
     * @param int $width optional
     * @return string $imageUrl
     */
    public function transform(string $base64, string $path, $fileName = null, $width = 1024)
    {
        // Sample: data:image/jpeg;base64,abc
        list($extension, $content) = explode(";base64,", $base64);
        list(, $extension) = explode('image/', Str::replaceFirst('jpeg', 'jpg', $extension));
        return $this->store(base64_decode($content), $path, $this->generateFileName($fileName, $extension), $width);
    }

    /**
     * Store image to internal.
     *
     * @param $image $request->file | base64_decode()
     * @param string $pathInput required
     * @param null $fileName optional, $fileName is null: $request->file, $fileName is not null: base64_decode()
     * @param int $width optional
     * @return string $imageUrl
     */
    public function store($image, string $pathInput, $fileName = null, $width = 1920)
    {
        $path = Str::finish($pathInput, '/');
        $this->makeDirectory($path);
        if (!$fileName) {
            $fileName = $this->getFileName($image->getClientOriginalName());
            Log::info('ImageService.store() ' . $path . $fileName . ', ' . $image->getClientMimeType());
            if (collect(['svg', 'gif', 'riff', 'webp'])->contains(Str::lower($image->extension()))) {
                $image->move($this->relativePath($path), $fileName);
                return $path . $fileName;
            }
            $image = $image->getRealPath();
        } else {
            Log::info('ImageService.store() ' . $path . $fileName);
            if (Str::endsWith(Str::lower($fileName), ['svg', 'gif', 'riff', 'webp'])) {
                File::put($this->relativePath($path . $fileName), $image);
                return $path . $fileName;
            }
        }

        $image = Image::make($image);
        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save($this->relativePath($path) . $fileName);
        return $path . $fileName;
    }

    public function delete($path)
    {
        if (Str::startsWith($path, config('constants.folder.upload'))) {
            File::delete($this->relativePath($path));
            Log::info('ImageService.delete() ' . $path);
        }
    }

    public function deleteDirectory($path)
    {
        if (Str::startsWith($path, config('constants.folder.upload'))) {
            File::deleteDirectory($this->relativePath($path));
            Log::info('ImageService.deleteDirectory() ' . $path);
        }
    }

    private function makeDirectory($path)
    {
        if (!File::exists($this->relativePath($path))) {
            File::makeDirectory($this->relativePath($path), 0755, true);
        }
    }

    private function relativePath($path)
    {
        return ltrim($path, '/');
    }

    private function generateFileName($fileName, $extension)
    {
        if ($fileName) {
            return $this->getFileName($fileName);
        }

        return Str::lower(Str::random(5)) . '.' . $extension;
    }

    private function getFileName($fileName)
    {
        $pathInfo = pathinfo($fileName);
        return Str::slug($pathInfo['filename'] . '-' . Str::random(3)) . '.' . Str::lower($pathInfo['extension']);
    }
}
