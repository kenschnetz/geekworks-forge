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
            Schema::create('collection_flags', function (Blueprint $table) {
                $table->id();
                $table->foreignId('collection_id')->constrained();
                $table->foreignId('flagger_id')->constrained('users');
                $table->foreignId('reviewer_id')->nullable()->constrained('users');
                $table->text('reason');
                $table->dateTime('reviewed_at')->nullable();
                $table->text('outcome')->nullable();
                $table->boolean('valid')->nullable();
                $table->timestamps();
                $table->unique([
                    'collection_id',
                    'flagger_id',
                ], 'collection_flag');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('collection_flags');
        }
    };
