<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class MessengerThreadMessage extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'messenger_thread_id' => null,
            'user_id' => null,
            'message' => null,
        ];

        public function Thread() {
            return $this->belongsTo(MessengerThread::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
