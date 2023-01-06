<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CollectionUpvote extends Model {
        use HasFactory;

        protected $fillable = [
            'collection_id',
            'user_id',
        ];

        public function Collection() {
            return $this->belongsTo(Collection::class);
        }

        public function Voter() {
            return $this->belongsTo(User::class);
        }
    }
