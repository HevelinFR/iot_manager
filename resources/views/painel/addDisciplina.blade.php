@extends('painel.main')

@section('title', 'Cadastro de disciplina')

@section('content')
<div class="wrapper-container">
    <form class="form" action="/adicionar-disciplina" method="POST">
        @csrf

        <h1>Adicionar Disciplina</h1>
        <div class="input-grup">
            <div class="input-box">
                <label for="codigo">Código</label><br>
                <input id="codigo" name="codigo" type="text" placeholder="Código" required>
                <label for="nome">Nome</label><br>
                <input id="nome" name="nome" type="text" placeholder="Nome" required>
                <label for="semestre">Semestre</label><br>
                <input id="semestre" type="text" name="semestre" placeholder="Semestre" required>
                <label for="ementa">Ementa</label><br>
                <textarea name="ementa" id="ementa" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="button flex-container">
            <div>
                <button class="btn">Salvar</button>
            </div>
            <div>
                <button class="btn red">Cancelar</button>
            </div>
        </div>
    </form>
</div>
@endsection

