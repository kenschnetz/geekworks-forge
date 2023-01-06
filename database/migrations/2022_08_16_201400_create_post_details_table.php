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
            Schema::create('post_details', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id')->constrained();
                $table->integer('version');
                $table->boolean('active');
                $table->string('title', 600)->unique();
                $table->text('description');
                $table->timestamps();
                $table->unique([
                    'post_id',
                    'version',
                ], 'post_version');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_details');
        }
    };
