<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    class RefactorPostContributorsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::table('post_contributors', function (Blueprint $table) {
                $table->foreignId('post_recommendation_id')->after('user_id');
                $table->foreign('post_recommendation_id')->onDelete('cascade')->references('id')->on('post_recommendations');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::table('post_contributors', function (Blueprint $table) {
                $table->dropForeign('post_recommendation_id');
                $table->dropColumn('post_recommendation_id');
            });
        }
    }
