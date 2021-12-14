<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateQuestsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('quests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('quest_line_id');
                $table->string('name')->unique();
                $table->text('description')->nullable();
                $table->integer('quest_line_position');
                $table->integer('experience_points_awarded')->comment('number of experience points awarded on completion');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('quest_line_id')->onDelete('cascade')->references('id')->on('quest_lines');
                $table->unique(['quest_line_id', 'quest_line_position']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('quests');
        }
    }
