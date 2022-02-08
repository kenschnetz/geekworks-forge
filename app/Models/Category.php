<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Laravel\Scout\Searchable;

    class Category extends Model {
        use Searchable;

        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'category_id' => null,
            'name' => null,
            'slug' => null,
            'description' => null,
            'live' => false,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }

        public function Categories() {
            return $this->hasMany(Category::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }

        /**
         * Get the index name for the model.
         */
        public function SearchableAs() {
            return 'category_index';
        }
    }
