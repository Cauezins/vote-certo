<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColigadasTable extends Migration
{
    public function up()
    {
        Schema::create('coligadas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->integer('id_resp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coligadas');
    }
}

