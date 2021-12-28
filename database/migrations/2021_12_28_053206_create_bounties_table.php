<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBountiesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('bounties', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('activity_id');
                $table->string('name', 400)->unique();
                $table->text('description')->nullable();
                $table->integer('count');
                $table->boolean('live');
                $table->dateTime('begins_at');
                $table->dateTime('ends_at');
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('activity_id')->onDelete('cascade')->references('id')->on('activities');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('bounties');
        }
    }
