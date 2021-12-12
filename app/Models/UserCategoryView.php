<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class UserCategoryView extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'category_id' => null,
            'views' => 0,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }
    }
