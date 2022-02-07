<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTicketsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('tickets', function (Blueprint $table) {
                $table->id();
                $table->foreignId('ticket_type_id');
                $table->foreignId('user_id');
                $table->foreignId('reviewer_id');
                $table->string('subject');
                $table->text('content');
                $table->dateTime('reviewed_at')->nullable();
                $table->dateTime('closed_at')->nullable();
                $table->timestamps();
                $table->foreign('ticket_type_id')->onDelete('cascade')->references('id')->on('ticket_types');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('reviewer_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('tickets');
        }
    }
