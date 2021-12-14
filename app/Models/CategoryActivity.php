<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class CategoryActivity extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_activity_id' => null,
            'category_id' => null,
            'date' => null,
            'count' => 0,
        ];

        public function UserActivity() {
            return $this->belongsTo(UserActivity::class);
        }

        public function Category() {
            return $this->belongsTo(Category::class);
        }
    }
