<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserActivityCollectionPostsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('collection_post_activity', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_activity_id');
                $table->foreignId('collection_post_id');
                $table->date('date')->nullable()->comment('this should be populated if the activity requires tracking daily, otherwise only one record should exist');
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->foreign('user_activity_id')->onDelete('cascade')->references('id')->on('user_activities');
                $table->foreign('collection_post_id')->onDelete('cascade')->references('id')->on('collection_posts');
                $table->unique(['user_activity_id', 'collection_post_id', 'date'], 'post');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_activity_collection_posts');
        }
    }
