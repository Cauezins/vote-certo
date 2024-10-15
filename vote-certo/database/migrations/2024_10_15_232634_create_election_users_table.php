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
        Schema::create('election_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('election_id')->constrained('elections');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('role', ['viewer', 'editor', 'admin']);
            $table->unsignedTinyInteger('order');
            $table->timestamps();

            $table->unique(['election_id', 'order']);
            $table->index(['election_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('election_users');
    }
};
