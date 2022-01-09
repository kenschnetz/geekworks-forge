<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateQuestLinesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('quest_lines', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->boolean('live')->default(false);
                $table->string('name')->unique();
                $table->text('description')->nullable();
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
            Schema::dropIfExists('quest_lines');
        }
    }
