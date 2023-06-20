<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_turmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_turma')->constraind();
            $table->unsignedBigInteger('id_aluno')->constraind();

            $table->foreign('id_turma')->references('id')->on('turmas');
            $table->foreign('id_aluno')->references('id')->on('alunos');
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
        Schema::dropIfExists('aluno_turma');
    }
}