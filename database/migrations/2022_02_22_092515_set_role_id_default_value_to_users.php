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
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role_id');
            });
            Schema::table('users', function (Blueprint $table) {
                $table->foreignId('role_id')->after('id')->default(4);
                $table->foreign('role_id')->onDelete('cascade')->references('id')->on('roles');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role_id');
            });
            Schema::table('users', function (Blueprint $table) {
                $table->integer('role_id')->nullable()->after('password');
            });
        }
    };
