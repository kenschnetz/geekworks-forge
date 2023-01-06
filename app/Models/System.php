<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class System extends Model {
        use HasFactory;

        protected $fillable = [
            'user_id',
            'slug',
            'name',
            'description',
        ];

        public function Author() {
            return $this->belongsTo(User::class);
        }

        public function Posts() {
            return $this->hasMany(Post::class);
        }
    }
