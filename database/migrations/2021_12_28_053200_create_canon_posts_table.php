<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCanonPostsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('canon_posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('canon_id');
                $table->foreignId('post_id');
                $table->timestamps();
                $table->foreign('canon_id')->onDelete('cascade')->references('id')->on('canons');
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->unique([
                    'canon_id',
                    'post_id'
                ]);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('canon_posts');
        }
    }
