<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserQuestsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_quests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('quest_id');
                $table->date('completed_at')->nullable();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('quest_id')->onDelete('cascade')->references('id')->on('quests');
                $table->unique([
                    'user_id',
                    'quest_id'
                ], 'user_quest');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_quests');
        }
    }
