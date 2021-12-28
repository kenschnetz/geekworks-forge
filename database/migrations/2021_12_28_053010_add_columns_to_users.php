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
                $table->dateTime('terms_accepted_at')->nullable()->after('role_id');
                $table->integer('unread_global_messages')->default(0)->after('terms_accepted_at');
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
