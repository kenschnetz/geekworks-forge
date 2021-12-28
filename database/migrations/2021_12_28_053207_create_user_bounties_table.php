<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserBountiesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_bounties', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('bounty_id');
                $table->integer('count')->default(0);
                $table->dateTime('completed_at');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('bounty_id')->onDelete('cascade')->references('id')->on('bounties');
                $table->unique([
                    'user_id',
                    'bounty_id',
                ], 'user_bounty');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_bounties');
        }
    }
