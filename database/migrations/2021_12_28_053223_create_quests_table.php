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
                $table->boolean('live')->default(false);
                $table->string('name')->unique();
                $table->text('description')->nullable();
                $table->integer('quest_index');
                $table->integer('experience_reward');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('quest_line_id')->onDelete('cascade')->references('id')->on('quest_lines');
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
