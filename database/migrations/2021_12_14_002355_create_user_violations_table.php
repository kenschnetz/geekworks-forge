<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserViolationsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_violations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('admin_user_id');
                $table->foreignId('post_flag_id');
                $table->foreignId('post_comment_flag_id');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('admin_user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('post_flag_id')->onDelete('cascade')->references('id')->on('post_flags');
                $table->foreign('post_comment_flag_id')->onDelete('cascade')->references('id')->on('post_comment_flags');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_violations');
        }
    }
