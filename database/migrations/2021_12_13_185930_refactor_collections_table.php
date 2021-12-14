<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class RefactorCollectionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('collections', function (Blueprint $table) {
                $table->string('name')->change();
                $table->text('description')->nullable()->change();
                $table->string('slug', 300)->unique()->after('name');
                $table->boolean('public')->default(true)->after('description')->comment('if true, anyone can view this collection');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::create('collections', function (Blueprint $table) {
                $table->string('name', 80)->unique()->change();
                $table->string('description', 200)->nullable()->change();
                $table->dropColumn(['slug', 'public']);
            });
        }
    }
