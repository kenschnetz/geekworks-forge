<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class RefactorCategoriesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('name')->change();
                $table->string('slug', 300)->change();
                $table->text('description')->nullable()->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('categories', function (Blueprint $table) {
                $table->string('name', 80)->unique()->change();
                $table->string('slug', 80)->unique()->change();
                $table->string('description', 200)->nullable()->change();
            });
        }
    }
