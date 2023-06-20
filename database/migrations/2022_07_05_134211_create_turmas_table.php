<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('cod_turma');
            $table->unsignedBigInteger('id_disciplina');
            $table->unsignedBigInteger('id_professor');
            $table->string('id_turma_aluno');

            $table->foreign('id_disciplina')->references('id')->on('disciplinas');
            $table->foreign('id_professor')->references('id')->on('professores');

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
        Schema::dropIfExists('turmas');
    }
}