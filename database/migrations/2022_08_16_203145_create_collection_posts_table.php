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
            Schema::create('collection_posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('collection_id')->constrained();
                $table->foreignId('post_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->boolean('approved')->default(false);
                $table->timestamps();
                $table->unique([
                    'collection_id',
                    'post_id',
                    'user_id',
                ], 'collection_post');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('collection_posts');
        }
    };
