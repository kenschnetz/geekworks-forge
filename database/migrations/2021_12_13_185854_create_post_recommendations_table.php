<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostRecommendationsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_recommendations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id');
                $table->foreignId('user_id');
                $table->string('title', 400);
                $table->boolean('title_accepted')->default(false);
                $table->text('description')->nullable();
                $table->boolean('description_accepted')->default(false);
                $table->text('content')->nullable();
                $table->boolean('content_accepted')->default(false);
                $table->boolean('tags_accepted')->default(false);
                $table->boolean('attributes_accepted')->default(false);
                $table->boolean('actions_accepted')->default(false);
                $table->timestamps();
                $table->foreign('post_detail_id')->onDelete('cascade')->references('id')->on('post_details');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_recommendations');
        }
    }
