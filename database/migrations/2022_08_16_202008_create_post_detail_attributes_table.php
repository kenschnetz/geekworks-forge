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
            Schema::create('post_detail_attributes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('post_detail_id')->constrained();
                $table->foreignId('attribute_id')->constrained();
                $table->string('value', 400);
                $table->softDeletes();
                $table->timestamps();
                $table->unique([
                    'post_detail_id',
                    'attribute_id',
                ], 'post_attribute');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_detail_attributes');
        }
    };
