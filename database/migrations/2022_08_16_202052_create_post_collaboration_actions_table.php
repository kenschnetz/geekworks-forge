<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_collaboration_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_collaboration_id')->constrained();
            $table->foreignId('action_id')->constrained();
            $table->string('value', 400);
            $table->timestamps();
            $table->unique([
                'post_collaboration_id',
                'action_id',
            ], 'post_collaboration_action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_collaboration_actions');
    }
};
