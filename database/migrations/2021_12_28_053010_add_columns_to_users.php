<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddColumnsToUsers extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('role_id')->nullable()->after('password');
                $table->boolean('terms_accepted')->default(false)->after('role_id');
                $table->dateTime('terms_accepted_at')->nullable()->after('terms_accepted');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('users', function (Blueprint $table) {
                //
            });
        }
    }
