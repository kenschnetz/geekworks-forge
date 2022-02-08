<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    class System extends Model {
        use Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
            'live' => false,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'system_index';
        }
    }
