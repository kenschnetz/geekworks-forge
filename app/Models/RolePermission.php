<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class RolePermission extends Model {
        protected $guarded = ['id'];
        protected $attributes = [
            'role_id' => null,
            'permission_id' => null,
        ];

        public function Role() {
            return $this->belongsTo(Role::class);
        }

        public function Permission() {
            return $this->belongsTo(Permission::class);
        }
    }
