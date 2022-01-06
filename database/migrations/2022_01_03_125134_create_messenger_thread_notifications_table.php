<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateMessengerThreadNotificationsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('messenger_thread_notifications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('messenger_thread_id');
                $table->foreignId('user_id');
                $table->integer('count');
                $table->dateTime('read_at')->nullable();
                $table->foreign('messenger_thread_id')->onDelete('cascade')->references('id')->on('messenger_threads');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique([
                    'messenger_thread_id',
                    'user_id',
                ], 'messenger_thread_notification');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('messenger_thread_notifications');
        }
    }
