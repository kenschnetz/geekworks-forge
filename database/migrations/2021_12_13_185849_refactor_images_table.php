<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorImagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('images', function (Blueprint $table) {
                $table->string('name')->change();
                $table->text('path')->comment('Path of the image on the server')->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('images', function (Blueprint $table) {
                $table->string('name', 80)->change();
                $table->string('path', 400)->comment('Path of the image on the server')->change();
            });
        }
    }
