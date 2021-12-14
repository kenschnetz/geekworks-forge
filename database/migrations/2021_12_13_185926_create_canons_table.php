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
                $table->string('name')->unique();
                $table->string('slug', 300)->unique();
                $table->text('description')->nullable();
                $table->boolean('public')->default(true)->comment('if true, anyone can add posts to this canon');
                $table->boolean('require_approval')->default(true)->comment('if true and public is also true, canon creator must approve posts before they are added to the canon');
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
