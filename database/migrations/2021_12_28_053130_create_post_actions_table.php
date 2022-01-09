<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostActionsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_actions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('action_id');
                $table->integer('post_actionable_id');
                $table->string('post_actionable_type');
                $table->string('value')->nullable();
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('action_id')->onDelete('cascade')->references('id')->on('actions');
                $table->unique([
                    'action_id',
                    'post_actionable_id',
                    'post_actionable_type',
                ], 'post_action');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_actions');
        }
    }
