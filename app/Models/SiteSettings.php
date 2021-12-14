<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class SiteSettings extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'version' => 0,
            'release' => 0,
        ];
    }
