<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_user_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id')->constrained();
                $table->foreignId('user_image_id')->constrained();
                $table->timestamps();
                $table->unique([
                    'post_id',
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
            Schema::dropIfExists('post_user_images');
        }
    };
