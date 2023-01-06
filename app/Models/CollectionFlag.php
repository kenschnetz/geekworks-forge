<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CollectionFlag extends Model {
        use HasFactory;

        protected $fillable = [
            'collection_id',
            'flagger_id',
            'reviewer_id',
            'reason',
            'reviewed_at',
            'outcome',
            'valid',
        ];

        protected $casts = [
            'reviewed_at' => 'datetime',
        ];

        public function Collection() {
            return $this->belongsTo(Collection::class);
        }

        public function Flagger() {
            return $this->belongsTo(User::class, 'flagger_id');
        }

        public function Reviewer() {
            return $this->belongsTo(User::class, 'reviewer_id');
        }
    }
