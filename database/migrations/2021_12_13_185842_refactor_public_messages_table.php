<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorPublicMessagesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('public_messages', function (Blueprint $table) {
                $table->boolean('moderated')->default(false)->after('content');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('public_messages', function (Blueprint $table) {
                $table->dropColumn('moderated');
            });
        }
    }
