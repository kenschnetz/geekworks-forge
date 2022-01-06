<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class MessengerThreadUser extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'messenger_thread_id' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Thread() {
            return $this->belongsTo(MessengerThread::class);
        }
    }
