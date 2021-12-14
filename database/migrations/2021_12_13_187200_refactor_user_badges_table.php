<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorUserBadgesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('user_badges', function (Blueprint $table) {
                $table->dateTime('completed_at')->nullable()->after('badge_id');
                $table->dropColumn(['points', 'earned']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('user_badges', function (Blueprint $table) {
                $table->integer('points')->after('badge_id')->comment('The number of points the user has earned towards the related badge');
                $table->boolean('earned')->after('points')->comment('If true, the user has earned this badge and no longer earns progress towards it');
            });
        }
    }
