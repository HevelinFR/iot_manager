<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmostrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amostras', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->string('data');
            $table->string('hora');
            $table->unsignedBigInteger('id_dispositivo')->constraind();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amostras');
    }
}
