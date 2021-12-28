<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostTagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tag_id');
                $table->integer('post_taggable_id');
                $table->string('post_taggable_type');
                $table->timestamps();
                $table->foreign('tag_id')->onDelete('cascade')->references('id')->on('tags');
                $table->unique([
                    'tag_id',
                    'post_taggable_id',
                    'post_taggable_type',
                ], 'post_tag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_tags');
        }
    }
