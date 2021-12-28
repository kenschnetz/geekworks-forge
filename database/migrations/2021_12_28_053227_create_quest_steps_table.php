<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateQuestStepsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('quest_steps', function (Blueprint $table) {
                $table->id();
                $table->foreignId('quest_id');
                $table->integer('step_index')->nullable();
                $table->integer('count');
                $table->timestamps();
                $table->foreign('quest_id')->onDelete('cascade')->references('id')->on('quests');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('quest_steps');
        }
    }
