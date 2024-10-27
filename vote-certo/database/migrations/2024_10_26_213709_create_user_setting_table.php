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
        Schema::create('user_setting', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('max_create_election');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    public function down() {
        Schema::dropIfExists('user_setting');
    }
};
