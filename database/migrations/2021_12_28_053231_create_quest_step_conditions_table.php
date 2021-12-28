<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateQuestStepConditionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('quest_step_conditions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('quest_step_id');
                $table->foreignId('activity_id');
                $table->integer('condition_index')->nullable();
                $table->integer('count');
                $table->timestamps();
                $table->foreign('quest_step_id')->onDelete('cascade')->references('id')->on('quest_steps');
                $table->foreign('activity_id')->onDelete('cascade')->references('id')->on('activities');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('quest_step_conditions');
        }
    }
