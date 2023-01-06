<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class UserFollow extends Model {
        use HasFactory;

        protected $fillable = [
            'follower_id',
            'followed_id',
        ];

        public function Follower() {
            return $this->belongsTo(User::class, 'follower_id');
        }

        public function Followed() {
            return $this->belongsTo(User::class, 'followed_id');
        }
    }
