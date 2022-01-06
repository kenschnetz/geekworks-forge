<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateMessengerThreadUsersTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('messenger_thread_users', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('messenger_thread_id');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('messenger_thread_id')->onDelete('cascade')->references('id')->on('messenger_threads');
                $table->unique([
                    'user_id',
                    'messenger_thread_id',
                ], 'messenger_thread_user');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('messenger_thread_users');
        }
    }
