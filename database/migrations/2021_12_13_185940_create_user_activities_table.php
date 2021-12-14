<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserActivitiesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_activities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('activity_id');
                $table->date('date')->nullable()->comment('this should be populated if the activity requires tracking daily, otherwise only one record should exist');
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('activity_id')->onDelete('cascade')->references('id')->on('activities');
                $table->unique(['user_id', 'activity_id', 'date'], 'activity');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_activities');
        }
    }
