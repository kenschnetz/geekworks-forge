<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBadgesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('badges', function (Blueprint $table) {
                $table->id();
                $table->foreignId('achievement_id');
                $table->text('image_path');
                $table->timestamps();
                $table->foreign('achievement_id')->onDelete('cascade')->references('id')->on('achievements');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('badges');
        }
    }
