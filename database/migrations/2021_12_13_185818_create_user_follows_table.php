<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserFollowsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_follows', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('followed_user_id');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('followed_user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique(['user_id', 'followed_user_id']);
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
    }
