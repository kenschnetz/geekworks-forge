<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostCollaboratorsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_collaborators', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id');
                $table->foreignId('user_id');
                $table->foreignId('post_collaboration_id');
                $table->timestamps();
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('post_collaboration_id')->onDelete('cascade')->references('id')->on('post_collaborations');
                $table->unique([
                    'post_id',
                    'user_id',
                    'post_collaboration_id',
                ], 'post_contributor');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_collaborators');
        }
    }
