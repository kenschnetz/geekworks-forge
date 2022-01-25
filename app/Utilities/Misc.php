<?php

	namespace App\Utilities;

    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Str;

    class Misc {
        public static function Slug($title, $model, $with_trashed = true) {
            $slug = Str::slug($title);
            $counter = 0;
            if ($with_trashed) {
                while ($model::where('slug', $counter > 0 ? $slug . '-' . $counter : $slug)->withTrashed()->exists()) {
                    $counter++;
                }
            } else {
                while ($model::where('slug', $counter > 0 ? $slug . '-' . $counter : $slug)->exists()) {
                    $counter++;
                }
            }
            if ($counter > 0) {
                $slug = $slug . '-' . $counter;
            }
            Log::debug($slug);
            return $slug;
        }
	}
