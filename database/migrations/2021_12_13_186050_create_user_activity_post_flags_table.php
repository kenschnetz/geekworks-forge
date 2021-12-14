<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserActivityPostFlagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_flag_activity', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_activity_id');
                $table->foreignId('post_flag_id');
                $table->date('date')->nullable()->comment('this should be populated if the activity requires tracking daily, otherwise only one record should exist');
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->foreign('user_activity_id')->onDelete('cascade')->references('id')->on('user_activities');
                $table->foreign('post_flag_id')->onDelete('cascade')->references('id')->on('post_flags');
                $table->unique(['user_activity_id', 'post_flag_id', 'date'], 'flag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_activity_post_flags');
        }
    }
