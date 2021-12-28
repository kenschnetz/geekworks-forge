<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PublicMessage extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'message' => null,
            'moderated' => false,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
