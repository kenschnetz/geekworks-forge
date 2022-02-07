<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTicketNotesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('ticket_notes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('ticket_id');
                $table->text('content');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('ticket_id')->onDelete('cascade')->references('id')->on('tickets');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('ticket_notes');
        }
    }
