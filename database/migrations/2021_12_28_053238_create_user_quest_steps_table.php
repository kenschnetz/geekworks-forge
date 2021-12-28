<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserQuestStepsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_quest_steps', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_quest_id');
                $table->foreignId('quest_step_id');
                $table->integer('count');
                $table->dateTime('completed_at')->nullable();
                $table->timestamps();
                $table->foreign('user_quest_id')->onDelete('cascade')->references('id')->on('user_quests');
                $table->foreign('quest_step_id')->onDelete('cascade')->references('id')->on('quest_steps');
                $table->unique([
                    'user_quest_id',
                    'quest_step_id'
                ], 'user_quest_step');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_quest_steps');
        }
    }
