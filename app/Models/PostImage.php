<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostImage extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'post_detail_id' => null,
            'user_image_id' => null,
        ];

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Image() {
            return $this->belongsTo(UserImage::class, 'user_image_id');
        }
    }
