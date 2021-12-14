<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserQuestConditionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('user_quest_conditions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_quest_id');
                $table->foreignId('quest_condition_id');
                $table->datetime('completed_at')->nullable()->comment('if set, this quest condition was completed on the date entered');
                $table->timestamps();
                $table->foreign('user_quest_id')->onDelete('cascade')->references('id')->on('user_quests');
                $table->foreign('quest_condition_id')->onDelete('cascade')->references('id')->on('quest_conditions');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('user_quest_conditions');
        }
    }
