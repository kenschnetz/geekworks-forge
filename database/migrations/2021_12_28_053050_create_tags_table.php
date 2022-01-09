<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->comment('ID of the user who added this tag to Forge');
                $table->string('slug')->unique();
                $table->string('name')->unique();
                $table->text('description');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('tags');
        }
    }
