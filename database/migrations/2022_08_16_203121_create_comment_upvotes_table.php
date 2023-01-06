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
            Schema::create('comment_upvotes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('comment_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->timestamps();
                $table->unique([
                    'comment_id',
                    'user_id',
                ], 'comment_upvote');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('comment_upvotes');
        }
    };
