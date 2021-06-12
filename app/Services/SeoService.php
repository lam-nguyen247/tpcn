<?php

namespace App\Services;

use App\Models\Seo;
use Illuminate\Support\Str;

class SeoService
{
    /**
     * Update seo
     *
     * @param $model
     * @param $request
     */
    public function save($model, $request)
    {
        if ($request->title || $request->description || $request->robots) {
            if ($request->title) {
                $canonical = Str::slug($request->title);
                $isExistedCanonical = Seo::where('canonical', $canonical)->exists();
                if ($isExistedCanonical) {
                    $seo = $model->seo()->first();
                    if (!$seo || $seo->title != $request->title) {
                        $request['canonical'] = $canonical . '-' . Str::lower(Str::random(3));
                    }
                } else {
                    $request['canonical'] = $canonical;
                }
            }
            $model->seo()->updateOrCreate(['seoable_id' => $model->id], $request->all());
        } else if ($model->seo()->exists()) {
            $model->seo()->delete();
        }
    }
}
