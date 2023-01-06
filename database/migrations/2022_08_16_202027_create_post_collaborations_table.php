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
            Schema::create('post_collaborations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained();
                $table->foreignId('post_id')->constrained();
                $table->string('title', 600)->unique();
                $table->boolean('title_accepted')->default(false);
                $table->text('description');
                $table->boolean('description_accepted')->default(false);
                $table->boolean('tags_accepted')->default(false);
                $table->boolean('attributes_accepted')->default(false);
                $table->boolean('actions_accepted')->default(false);
                $table->string('status')->default('Open');
                $table->string('outcome')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('post_collaborations');
        }
    };
