<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorPostsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::rename('posts', 'old_posts');
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_type_id')->default(1);
                $table->foreignId('user_id');
                $table->foreignId('post_id')->nullable();
                $table->foreignId('system_id');
                $table->foreignId('category_id')->nullable();
                $table->boolean('published')->default(false)->comment('if true, the post is visible to others');
                $table->boolean('moderated')->default(false)->comment('if true, admin or moderator has unpublished this post');
                $table->boolean('allow_conversions')->default(true)->comment('if true, allow other users to create conversion to a different system');
                $table->boolean('is_conversion')->default(false)->comment('if true, this is a conversion of the related post_id to a different system');
                $table->boolean('is_art_only')->default(false)->comment('if true, this post is an art only idea');
                $table->boolean('locked_art')->default(true)->comment('// if true and if is_art_only, this idea cannot be used by other ideas');
                $table->boolean('locked_canon')->default(true)->comment('// if true, this post cannot be added to a canon not belonging to a post contributor');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('posts');
            Schema::rename('old_posts', 'posts');
        }
    }
