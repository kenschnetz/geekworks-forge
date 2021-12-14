<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserActivityCategoriesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('category_activity', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_activity_id');
                $table->foreignId('category_id');
                $table->date('date')->nullable()->comment('this should be populated if the activity requires tracking daily, otherwise only one record should exist');
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->foreign('user_activity_id')->onDelete('cascade')->references('id')->on('user_activities');
                $table->foreign('category_id')->onDelete('cascade')->references('id')->on('categories');
                $table->unique(['user_activity_id', 'category_id', 'date'], 'category');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_activity_categories');
        }
    }
