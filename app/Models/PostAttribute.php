<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PostAttribute extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'attribute_id' => null,
            'post_taggable_id' => null,
            'post_taggable_type' => null,
        ];

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }

        public function PostAttributable() {
            return $this->morphTo(__FUNCTION__, 'post_attributable_type', 'post_attributable_id');
        }
    }
