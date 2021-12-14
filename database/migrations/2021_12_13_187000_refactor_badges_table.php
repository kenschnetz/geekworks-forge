<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorBadgesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('badges', function (Blueprint $table) {
                $table->foreignId('user_id')->after('id');
                $table->foreignId('achievement_id')->after('id');
                $table->string('name')->change();
                $table->text('description')->nullable()->change();
                $table->text('badge_image_path');
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('achievement_id')->onDelete('cascade')->references('id')->on('achievements');
                $table->dropColumn('required_points');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('badges', function (Blueprint $table) {
                $table->string('name', 80)->change();
                $table->string('description', 200)->change();
                $table->string('required_points')->after('description')->comment('The number of points required to earn this badge');
            });
        }
    }
