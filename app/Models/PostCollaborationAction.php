<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostCollaborationAction extends Model {
        use HasFactory;

        protected $fillable = [
            'post_collaboration_id',
            'action_id',
            'value',
        ];

        public function PostCollaboration() {
            return $this->belongsTo(PostCollaboration::class);
        }

        public function Action() {
            return $this->belongsTo(Action::class);
        }
    }
