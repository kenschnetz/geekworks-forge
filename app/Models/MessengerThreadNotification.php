<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class MessengerThreadNotification extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'messenger_thread_id' => null,
            'user_id' => null,
            'count' => 1,
        ];
        public $timestamps = false;

        public function Thread() {
            return $this->belongsTo(MessengerThread::class);
        }

        public function User() {
            return $this->belongsTo(User::class);
        }
    }
