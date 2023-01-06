<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CollectionPost extends Model {
        use HasFactory;

        protected $fillable = [
            'collection_id',
            'post_id',
            'user_id',
            'approved',
        ];

        public function Collection() {
            return $this->belongsTo(Collection::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Collector() {
            return $this->belongsTo(User::class);
        }
    }
