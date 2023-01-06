<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostDetailAttribute extends Model {
        use HasFactory;

        protected $fillable = [
            'post_detail_id',
            'attribute_id',
            'value',
        ];

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }
    }
