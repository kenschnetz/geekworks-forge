<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Ticket extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'ticket_type_id' => null,
            'user_id' => null,
            'reviewer_id' => null,
            'subject' => null,
            'content' => null,
            'reviewed_at' => null,
            'closed_at' => null,
        ];

        public function Type() {
            return $this->belongsTo(TicketType::class, 'ticket_type_id');
        }

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Reviewer() {
            return $this->belongsTo(User::class, 'reviewer_id');
        }

        public function Notes() {
            return $this->hasMany(TicketNote::class);
        }
    }
