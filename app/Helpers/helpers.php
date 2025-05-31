<?php

use Illuminate\Support\Str;

if (! function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $title, $slugField = 'slug')
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while ($model::where($slugField, $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
