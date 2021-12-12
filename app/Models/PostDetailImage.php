<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostDetailImage extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'image_id' => null,
        ];

        public function PostDetail() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Image() {
            return $this->belongsTo(Image::class);
        }
    }
