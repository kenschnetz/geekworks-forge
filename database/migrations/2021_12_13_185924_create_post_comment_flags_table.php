<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostCommentFlagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::dropIfExists('reported_post_comments');
            Schema::create('post_comment_flags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_comment_id');
                $table->foreignId('user_id');
                $table->foreignId('reviewer_user_id')->nullable()->comment(' user id of the flag reviewer');
                $table->string('reason');
                $table->dateTime('reviewed_at')->nullable()->comment('datetime the flag was reviewed');
                $table->text('reviewer_notes')->nullable()->comment('any notes by the reviewer');
                $table->boolean('valid')->nullable()->comment('if true, this flag was warranted and goes against the comment author as a violation');
                $table->timestamps();
                $table->foreign('post_comment_id')->onDelete('cascade')->references('id')->on('post_comments');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('reviewer_user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique(['post_comment_id', 'user_id']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_comment_flags');
        }
    }
