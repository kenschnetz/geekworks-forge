<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateQuestConditionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('quest_conditions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('quest_id');
                $table->foreignId('activity_id');
                $table->integer('count')->comment('number of times the activity must occur to consider this condition met');
                $table->foreign('quest_id')->onDelete('cascade')->references('id')->on('quests');
                $table->foreign('activity_id')->onDelete('cascade')->references('id')->on('activities');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('quest_conditions');
        }
    }
