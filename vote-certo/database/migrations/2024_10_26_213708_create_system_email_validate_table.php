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
        Schema::create('system_email_validate', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->time('time');
            $table->string('code');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('system_email_validate');
    }
};
