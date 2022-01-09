<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePostAttributesTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('post_attributes', function (Blueprint $table) {
                $table->id();
                $table->foreignId('attribute_id');
                $table->integer('post_attributable_id');
                $table->string('post_attributable_type');
                $table->string('value')->nullable();
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('attribute_id')->onDelete('cascade')->references('id')->on('attributes');
                $table->unique([
                    'attribute_id',
                    'post_attributable_id',
                    'post_attributable_type',
                ], 'post_attribute');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_attributes');
        }
    }
