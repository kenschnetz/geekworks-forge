<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class RefactorPrivateMessagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('private_messages', function (Blueprint $table) {
                $table->dropColumn('read');
                $table->dateTime('read_at')->after('content');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('private_messages', function (Blueprint $table) {
                $table->dropColumn('read_at');
                $table->boolean('read')->after('content');
            });
        }
    }
