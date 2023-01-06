<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_follows', function (Blueprint $table) {
                $table->id();
                $table->foreignId('follower_id')->constrained('users');
                $table->foreignId('followed_id')->constrained('users');
                $table->timestamps();
                $table->unique([
                    'follower_id',
                    'followed_id',
                ], 'follow');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_follows');
        }
    };
