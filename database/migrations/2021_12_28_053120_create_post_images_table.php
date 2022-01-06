<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostImagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id');
                $table->foreignId('user_image_id');
                $table->timestamps();
                $table->foreign('post_detail_id')->onDelete('cascade')->references('id')->on('post_details');
                $table->foreign('user_image_id')->onDelete('cascade')->references('id')->on('user_images');
                $table->unique([
                    'post_detail_id',
                    'user_image_id',
                ], 'post_image');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_images');
        }
    }
