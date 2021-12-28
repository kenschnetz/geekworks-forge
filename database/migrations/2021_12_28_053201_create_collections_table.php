<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCollectionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('collections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name', 400);
                $table->string('slug', 450);
                $table->text('description');
                $table->boolean('public')->default(true);
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique([
                    'user_id',
                    'slug'
                ], 'collection');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('collections');
        }
    }
