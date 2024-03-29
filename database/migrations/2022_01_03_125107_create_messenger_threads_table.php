<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateMessengerThreadsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('messenger_threads', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->boolean('private');
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('messenger_threads');
        }
    }
