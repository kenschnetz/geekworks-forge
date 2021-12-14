<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostFlagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::dropIfExists('reported_posts');
            Schema::create('post_flags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id');
                $table->foreignId('user_id');
                $table->foreignId('reviewer_user_id')->nullable()->comment(' user id of the flag reviewer');
                $table->string('reason');
                $table->dateTime('reviewed_at')->nullable()->comment('datetime the flag was reviewed');
                $table->text('reviewer_notes')->nullable()->comment('any notes by the reviewer');
                $table->boolean('valid')->nullable()->comment('if true, this flag was warranted and goes agains the post author as a derogatory mark');
                $table->timestamps();
                $table->foreign('post_id')->onDelete('cascade')->references('id')->on('posts');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('reviewer_user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique(['post_id', 'user_id']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_flags');
        }
    }
