<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostCollaboration extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'post_id',
            'title',
            'title_accepted',
            'description',
            'description_accepted',
            'tags_accepted',
            'attributes_accepted',
            'actions_accepted',
            'status',
            'outcome',
        ];

        public function User() {
            return $this->belongsTo(User::class);
        }

        public function Post() {
            return $this->belongsTo(Post::class);
        }

        public function Tags() {
            return $this->hasManyThrough(Tag::class, PostCollaborationTag::class);
        }

        public function Attributes() {
            return $this->hasManyThrough(Attribute::class, PostCollaborationAttribute::class);
        }

        public function Actions() {
            return $this->hasManyThrough(Action::class, PostCollaborationAction::class);
        }
    }
