<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_type_id');
                $table->foreignId('user_id');
                $table->foreignId('post_id');
                $table->foreignId('system_id');
                $table->foreignId('category_id');
                $table->boolean('published')->default(false);
                $table->boolean('moderated')->default(false);
                $table->boolean('allow_conversions')->default(true);
                $table->boolean('is_art_only')->default(false);
                $table->boolean('locked_art')->default(true);
                $table->boolean('locked_canon')->default(true);
                $table->boolean('is_conversion')->default(false);
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('post_type_id')->onDelete('cascade')->references('id')->on('post_types');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->foreign('system_id')->onDelete('cascade')->references('id')->on('systems');
                $table->foreign('category_id')->onDelete('cascade')->references('id')->on('categories');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('posts');
        }
    }
