<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorTagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('tags', function (Blueprint $table) {
                $table->string('name')->change();
                $table->text('description')->nullable()->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('tags', function (Blueprint $table) {
                $table->string('name', 80)->change();
                $table->string('description', 200)->nullable()->change();
            });
        }
    }
