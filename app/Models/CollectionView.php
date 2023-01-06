<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CollectionView extends Model {
        use HasFactory;

        protected $fillable = [
            'collection_id',
            'user_id',
            'count',
        ];

        public function Collection() {
            return $this->belongsTo(Collection::class);
        }

        public function Viewer() {
            return $this->belongsTo(User::class);
        }
    }
