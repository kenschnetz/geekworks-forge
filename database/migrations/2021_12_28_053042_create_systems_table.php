<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateSystemsTable extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('systems', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->comment('ID of the user who proposed this system be added to Forge');
                $table->string('name')->unique();
                $table->text('description');
                $table->boolean('live')->default(false);
                $table->timestamps();
                $table->foreign('user_id')->onDelete('cascade')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('systems');
        }
    }
