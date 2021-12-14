<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserAchievementConditionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_achievement_conditions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_achievement_id');
                $table->foreignId('achievement_condition_id');
                $table->datetime('completed_at')->nullable()->comment('if set, this quest condition was completed on the date entered');
                $table->timestamps();
                $table->foreign('user_achievement_id')->onDelete('cascade')->references('id')->on('user_achievements');
                $table->foreign('achievement_condition_id')->onDelete('cascade')->references('id')->on('achievement_conditions');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_achievement_conditions');
        }
    }
