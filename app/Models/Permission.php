<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Permission extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'name' => null,
            'description' => null,
        ];

        public function Roles() {
            return $this->belongsToMany(Role::class, 'role_permissions');
        }
    }
