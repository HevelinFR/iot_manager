@extends('painel.main')

@section('content')
<div class="wrapper-container">
    <form class="form" action="/adicionar-turma" method="POST">
        @csrf
        <h1>Adicionar Turma</h1>

        <div class="input-grup">
            <div class="input-box">
                <div class="flex-container">
                    <div class="input-form">
                        <label for="cod_turma">Código</label><br>
                        <input id="cod_turma" name="cod_turma" type="text" placeholder="Código" required>
                    </div>
                    <div class="input-form">
                        <label for="semestre">Semestre</label><br>
                        <input id="semestre" name="semestre" type="text" placeholder="Semestre" required>
                    </div>
                </div>

                <div class="flex-container">
                    <div class="input-form">
                        <label for="disciplina">Disciplina</label><br>
                        <select name="disciplina_id" id="disciplina_id" class="form-control">
                            @foreach( $disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}" >{{ $disciplina->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="professor">Professor</label><br>
                        <select name="professores_id" id="professor" class="form-control">
                            @foreach( $professores as $professor)
                            <option value="{{ $professor->id }}" >{{ $professor->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="button flex-container">
            <div>
                <button type="submit" class="btn">Salvar</button>
            </div>
            <div>
                <button class="btn red">Cancelar</button>
            </div>
        </div>
    </form>
@endsection

