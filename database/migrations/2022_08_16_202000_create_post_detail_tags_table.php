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
            Schema::create('post_detail_tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id')->constrained();
                $table->foreignId('tag_id')->constrained();
                $table->softDeletes();
                $table->timestamps();
                $table->unique([
                    'post_detail_id',
                    'tag_id',
                ], 'post_tag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_detail_tags');
        }
    };
