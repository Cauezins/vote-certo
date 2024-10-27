<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('election_setting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->boolean('public_results');
            $table->enum('category', ['public', 'private', 'corporate']); // ajuste categorias conforme necessário
            $table->boolean('send_email');
            $table->boolean('start_automatic');
            $table->boolean('start');
            $table->timestamps();

            $table->foreign('election_id')->references('id')->on('elections')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down() {
        Schema::dropIfExists('election_setting');
    }
};
