<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Role extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Permission() {
            return $this->belongsToMany(Permission::class, 'role_permissions');
        }
    }
