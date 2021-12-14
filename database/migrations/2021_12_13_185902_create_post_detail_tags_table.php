<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostDetailTagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_detail_tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id');
                $table->foreignId('tag_id');
                $table->foreignId('post_recommendation_id')->nullable();
                $table->timestamps();
                $table->foreign('post_detail_id')->onDelete('cascade')->references('id')->on('post_details');
                $table->foreign('tag_id')->onDelete('cascade')->references('id')->on('tags');
                $table->foreign('post_recommendation_id')->onDelete('cascade')->references('id')->on('post_recommendations');
                $table->unique(['post_detail_id', 'tag_id']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_detail_tags');
        }
    }
