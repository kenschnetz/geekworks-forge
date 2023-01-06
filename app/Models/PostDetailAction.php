<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class PostDetailAction extends Model {
        use HasFactory;

        protected $fillable = [
            'post_detail_id',
            'action_id',
            'value',
        ];

        public function PostDetails() {
            return $this->belongsTo(PostDetail::class);
        }

        public function Action() {
            return $this->belongsTo(Action::class);
        }
    }
