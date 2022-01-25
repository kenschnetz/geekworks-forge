<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class PostAction extends Model {
        use SoftDeletes;
        protected $guarded = ['id'];
        protected $attributes = [
            'action_id' => null,
            'post_actionable_id' => null,
            'post_actionable_type' => null,
            'value' => '',
        ];

        public function Action() {
            return $this->belongsTo(Action::class);
        }

        public function PostActionable() {
            return $this->morphTo(__FUNCTION__, 'post_actionable_type', 'post_actionable_id');
        }
    }
