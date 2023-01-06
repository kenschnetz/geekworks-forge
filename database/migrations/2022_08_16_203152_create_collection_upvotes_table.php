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
            Schema::create('collection_upvotes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('collection_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->timestamps();
                $table->unique([
                    'collection_id',
                    'user_id',
                ], 'collection_upvote');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('collection_upvotes');
        }
    };
