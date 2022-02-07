<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class TicketType extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Tickets() {
            return $this->hasMany(Ticket::class);
        }
    }
