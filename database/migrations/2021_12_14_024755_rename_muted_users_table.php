<?php

    use Illuminate\Database\Migrations\Migration;

    class RenameMutedUsersTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::rename('muted_users', 'user_mutes');
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::rename('user_mutes', 'muted_users');
        }
    }
