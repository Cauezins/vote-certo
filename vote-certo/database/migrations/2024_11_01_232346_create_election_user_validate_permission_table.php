<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('election_user_validate_permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('election_id');
            $table->string('email');
            $table->enum('role', ['admin', 'edit', 'viewer']);
            $table->boolean('state')->default(0);

            $table->foreign('election_id')->references('id')->on('elections')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_user_validate_permission');
    }
};
