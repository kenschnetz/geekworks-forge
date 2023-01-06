<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostDetailTag extends Model {
        use HasFactory;

        protected $fillable = [
            'post_detail_id',
            'tag_id',
        ];

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }
    }
