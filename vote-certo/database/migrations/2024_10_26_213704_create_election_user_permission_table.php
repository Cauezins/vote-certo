<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('election_user_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('role', ['admin', 'edit', 'viewer']); // ajuste roles conforme necessário
            $table->tinyInteger('order');
            $table->timestamps();

            $table->foreign('election_id')->references('id')->on('elections')->onUpdate('no action')->onDelete('no action');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down() {
        Schema::dropIfExists('election_user_permission');
    }
};
