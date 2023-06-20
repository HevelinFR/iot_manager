@extends('painel.main')

@section('content')

<div class="wrapper-container">
    <form class="form" action="/matricula" method="POST">
        @csrf
        <h1>Adicionar Aluno</h1>
            <div class="input-grup">
                <div  class="input-box">
                    <div class="flex-container">
                        <div class="input-form">
                            <label for="aluno">Aluno</label><br>
                            <select name="aluno_id"  class="form-control">
                                <option disabled selected>Selecione</option>
                                @foreach( $alunos as $aluno)
                                <option value="{{ $aluno->id }}" >{{ $aluno->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-form">
                            <label for="turma">Turma</label><br>

                            <select name="turma_id"  class="form-control">
                                <option disabled selected>Selecione</option>
                                @foreach( $turmas as $turma)
                                <option value="{{ $turma->id }}" >{{ $turma->cod_turma}} - {{$turma->disciplina->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="button flex-container">
                <div>
                    <button type="submit"  class="btn">Salvar</button>
                </div>
                <div>
                    <a href="/alunos" class="btn red">Cancelar</a>
                </div>
            </div>
    </form>

</div>
@endsection

