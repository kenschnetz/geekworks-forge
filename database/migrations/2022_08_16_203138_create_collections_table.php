<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('collections', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->string('slug', 600)->unique();
                $table->string('name', 600)->unique();
                $table->text('description')->nullable();
                $table->integer('total_views')->default(0);
                $table->boolean('publicly_visible')->default(false);
                $table->boolean('allow_collaboration')->default(false);
                $table->boolean('require_approval')->default(true);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('collections');
        }
    };
