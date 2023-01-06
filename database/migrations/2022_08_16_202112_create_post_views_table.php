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
            Schema::create('post_views', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_id')->constrained();
                $table->foreignId('user_id')->constrained();
                $table->integer('count')->default(0);
                $table->timestamps();
                $table->unique([
                    'post_id',
                    'user_id',
                ], 'post_view');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_views');
        }
    };
