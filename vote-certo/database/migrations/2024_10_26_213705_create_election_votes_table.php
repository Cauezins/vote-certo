<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('election_votes', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('election_id'); // Deve ser unsignedBigInteger
            $table->boolean('has_voted');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('election_users')->onUpdate('no action')->onDelete('no action');
            $table->foreign('election_id')->references('id')->on('elections')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down() {
        Schema::dropIfExists('election_votes');
    }
};
