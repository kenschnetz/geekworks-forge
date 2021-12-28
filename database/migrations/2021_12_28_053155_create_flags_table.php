<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateFlagsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('flags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->foreignId('reviewer_id');
                $table->integer('flaggable_id');
                $table->string('flaggable_type');
                $table->text('reason');
                $table->dateTime('reviewed_at')->nullable();
                $table->text('reviewer_notes')->nullable();
                $table->boolean('valid')->nullable();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
                $table->foreign('reviewer_id')->onDelete('cascade')->references('id')->on('users');
                $table->unique([
                    'user_id',
                    'flaggable_id',
                    'flaggable_type',
                ], 'flag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('flags');
        }
    }
