<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostCollaborationAttribute extends Model {
        use HasFactory;

        protected $fillable = [
            'post_collaboration_id',
            'attribute_id',
            'value',
        ];

        public function PostCollaboration() {
            return $this->belongsTo(PostCollaboration::class);
        }

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }
    }
