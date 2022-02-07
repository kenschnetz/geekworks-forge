<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class TicketNote extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'user_id' => null,
            'ticket_id' => null,
            'content' => null,
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Ticket() {
            return $this->belongsTo(Ticket::class);
        }
    }
