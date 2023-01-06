<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostCollaborationTag extends Model {
        use HasFactory;

        protected $fillable = [
            'post_collaboration_id',
            'tag_id',
        ];

        public function PostCollaboration() {
            return $this->belongsTo(PostCollaboration::class);
        }

        public function Tag() {
            return $this->belongsTo(Tag::class);
        }
    }
