<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class PostAttribute extends Model {
        use SoftDeletes;
        protected $guarded = ['id'];
        protected $attributes = [
            'attribute_id' => null,
            'post_attributable_id' => null,
            'post_attributable_type' => null,
            'value' => '',
        ];

        public function Attribute() {
            return $this->belongsTo(Attribute::class);
        }

        public function PostAttributable() {
            return $this->morphTo(__FUNCTION__, 'post_attributable_type', 'post_attributable_id');
        }
    }
