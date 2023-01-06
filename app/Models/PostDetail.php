<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostDetail extends Model {
        use HasFactory;

        protected $fillable = [
            'post_id',
            'version',
            'active',
            'title',
            'content',
        ];

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Tags() {
            return $this->hasMany(PostDetailTag::class);
        }

        public function Attributes() {
            return $this->hasMany(PostDetailAttribute::class);
        }

        public function Actions() {
            return $this->hasMany(PostDetailAction::class);
        }
    }
