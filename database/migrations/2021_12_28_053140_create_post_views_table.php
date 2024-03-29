<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostViewsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_views', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id');
                $table->foreignId('user_id');
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique([
                    'post_id',
                    'user_id'
                ], 'post_view');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_views');
        }
    }
