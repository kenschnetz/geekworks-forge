<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddCategoryIdToCategories extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('categories', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('user_id')->comment('ID of the parent Category - if set, this is a sub-category');
                $table->foreign('category_id')->onDelete('cascade')->references('id')->on('categories');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            });
        }
    }
