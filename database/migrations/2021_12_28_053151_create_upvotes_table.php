<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUpvotesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('upvotes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->integer('upvotable_id');
                $table->string('upvotable_type');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique([
                    'user_id',
                    'upvotable_id',
                    'upvotable_type',
                ], 'upvote');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('upvotes');
        }
    }
