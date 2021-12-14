<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateAchievementsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('achievements', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name')->unique();
                $table->text('description')->nullable();
                $table->integer('experience_points_awarded')->comment('number of experience points awarded on completion');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('achievements');
        }
    }
