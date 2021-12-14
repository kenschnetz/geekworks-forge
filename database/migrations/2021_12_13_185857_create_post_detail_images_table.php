<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostDetailImagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_detail_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id');
                $table->foreignId('image_id');
                $table->timestamps();
                $table->foreign('post_detail_id')->onDelete('cascade')->references('id')->on('post_details');
                $table->foreign('image_id')->onDelete('cascade')->references('id')->on('images');
                $table->unique(['post_detail_id', 'image_id']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_detail_images');
        }
    }
