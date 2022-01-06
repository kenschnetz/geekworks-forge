<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateMessengerThreadMessagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('messenger_thread_messages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('messenger_thread_id');
                $table->foreignId('user_id');
                $table->text('message');
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('messenger_thread_id')->onDelete('cascade')->references('id')->on('messenger_threads');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('messenger_thread_messages');
        }
    }
