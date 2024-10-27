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
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('maintance_admin');
            $table->boolean('maintance_landing_page');
            $table->boolean('maintance_election');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('system_settings');
    }
};
