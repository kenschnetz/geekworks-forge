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
            Schema::create('post_collaboration_tags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_collaboration_id')->constrained();
                $table->foreignId('tag_id')->constrained();
                $table->timestamps();
                $table->unique([
                    'post_collaboration_id',
                    'tag_id',
                ], 'post_collaboration_tag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_collaboration_tags');
        }
    };
