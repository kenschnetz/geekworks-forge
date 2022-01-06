<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class MessengerThread extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'name' => null,
            'description' => null,
            'private' => true,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Users() {
            return $this->belongsToMany(User::class, 'messenger_thread_users');
        }

        public function Messages() {
            return $this->hasMany(MessengerThreadMessage::class);
        }

        public function Notifications() {
            return $this->hasMany(MessengerThreadNotification::class);
        }
    }
