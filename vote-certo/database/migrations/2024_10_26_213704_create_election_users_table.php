<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('election_users', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->unsignedBigInteger('election_id'); // Deve ser unsignedBigInteger
            $table->string('name');
            $table->string('email');
            $table->string('field_one');
            $table->string('field_one_type');
            $table->string('field_double');
            $table->string('field_double_type');
            $table->timestamps();

            // A referência deve estar correta
            $table->foreign('election_id')->references('id')->on('elections')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down() {
        Schema::dropIfExists('election_users');
    }
};
