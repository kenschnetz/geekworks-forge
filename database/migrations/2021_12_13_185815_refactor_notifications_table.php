<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class RefactorNotificationsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::dropIfExists('notifications');
            Schema::create('notifications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->text('message');
                $table->dateTime('read_at')->nullable();
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
            Schema::dropIfExists('notifications');
        }
    }
