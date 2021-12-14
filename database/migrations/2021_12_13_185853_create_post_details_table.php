<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostDetailsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id');
                $table->integer('version')->default(1);
                $table->boolean('active')->default(true);
                $table->string('title', 400)->unique();
                $table->string('slug', 450)->unique();
                $table->text('description')->nullable();
                $table->text('content')->nullable();
                $table->boolean('requesting_recommendations')->default(false);
                $table->timestamps();
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_details');
        }
    }
