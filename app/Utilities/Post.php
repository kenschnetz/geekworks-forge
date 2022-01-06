<?php

	namespace App\Utilities;

    use App\Models\Post as PostModel;
	use Illuminate\Support\Str;

    class Post {
        public static function Slug($title) {
            $slug = Str::slug($title);
            $counter = 0;
            while(PostModel::where('slug', $counter > 0 ? $slug . '-' . $counter : $slug)->withTrashed()->exists()) {
                $counter++;
            }
            if ($counter > 0) {
                $slug = $slug . '-' . $counter;
            }
            return $slug;
        }
	}
