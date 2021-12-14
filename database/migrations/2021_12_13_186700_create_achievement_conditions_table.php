<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAchievementConditionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('achievement_conditions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('achievement_id');
                $table->foreignId('activity_id');
                $table->integer('count')->comment('number of times the activity must occur to consider this condition met');
                $table->foreign('achievement_id')->onDelete('cascade')->references('id')->on('achievements');
                $table->foreign('activity_id')->onDelete('cascade')->references('id')->on('activities');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('achievement_conditions');
        }
    }
