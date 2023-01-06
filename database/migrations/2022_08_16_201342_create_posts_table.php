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
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('post_id')->nullable()->constrained();
                $table->foreignId('system_id')->constrained();
                $table->foreignId('category_id')->constrained();
                $table->string('post_type');
                $table->string('slug', 600)->unique();
                $table->integer('total_views')->default(0);
                $table->boolean('published')->default(false);
                $table->boolean('moderated')->default(false);
                $table->boolean('allow_canonizing')->default(true);
                $table->boolean('allow_collaborating')->default(true);
                $table->softDeletes();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('posts');
        }
    };
