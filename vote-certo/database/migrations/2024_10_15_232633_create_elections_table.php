<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('elections', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger
            $table->foreignId('created_id')->constrained('users')->onUpdate('no action')->onDelete('no action');
            $table->text('title');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('elections');
    }
};
