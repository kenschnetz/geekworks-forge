<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostCollaborationsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_collaborations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('post_detail_id');
                $table->text('summary');
                $table->string('title')->unique();
                $table->boolean('title_accepted')->default(false);
                $table->string('description')->nullable();
                $table->boolean('description_accepted')->default(false);
                $table->text('content')->nullable();
                $table->boolean('content_accepted')->default(false);
                $table->boolean('tags_accepted')->default(false);
                $table->boolean('attributes_accepted')->default(false);
                $table->boolean('actions_accepted')->default(false);
                $table->boolean('reviewed')->default(false);
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('post_detail_id')->onDelete('cascade')->references('id')->on('post_details');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_collaborations');
        }
    }
