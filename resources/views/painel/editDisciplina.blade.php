@extends('painel.main')

@section('title', 'Editando disciplina')

@section('content')
<div class="wrapper-container">
    <form class="form" action="/disciplina/update/{{$disciplina->id}}" method="POST">
        @csrf
        @method('PUT')
        <h1>Adicionar Disciplina</h1>
        <div class="input-grup">
            <div class="input-box">
                <label for="codigo">Código</label><br>
                <input id="codigo" name="cod_disciplina" type="text" placeholder="Código" required value="{{$disciplina->cod_disciplina}}">
                <label for="nome">Nome</label><br>
                <input id="nome" name="nome" type="text" placeholder="Nome" required value="{{$disciplina->nome}}">
                <label for="semestre">Semestre</label><br>
                <input id="semestre" type="text" name="semestre" placeholder="Semestre" required value="{{$disciplina->semestre}}">
                <label for="ementa">Ementa</label><br>
                <textarea name="ementa" id="ementa" cols="30" rows="10">{{$disciplina->ementa}}</textarea>
            </div>
        </div>

        <div class="button flex-container">
            <div>
                <button type="submit" class="btn">Salvar</button>
            </div>
            <div>
                <a href="/disciplina" class="btn red">Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection

