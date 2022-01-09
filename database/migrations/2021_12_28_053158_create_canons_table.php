<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCanonsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('canons', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('slug', 450)->unique();
                $table->string('name')->unique();
                $table->text('description');
                $table->boolean('public')->default(true);
                $table->boolean('require_approval')->default(true);
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('canons');
        }
    }
