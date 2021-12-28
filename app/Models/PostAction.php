<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostAction extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'action_id' => null,
            'post_taggable_id' => null,
            'post_taggable_type' => null,
        ];

        public function Action() {
            return $this->belongsTo(Action::class);
        }

        public function PostActionable() {
            return $this->morphTo(__FUNCTION__, 'post_actionable_type', 'post_actionable_id');
        }
    }
