@extends('painel.main')

@section('title', 'Editando:'.$aluno->nome)

@section('content')

<div class="wrapper-container">
    <form class="form" action="/alunos/update/{{$aluno->id}}" method="POST">
        @csrf
        @method('PUT')
        <h1>Editar Aluno</h1>
            <div class="input-grup">
                <div  class="input-box">
                    <label for="matricula">Matrícula</label><br>
                    <input id="matricula" name="matricula" type="text" placeholder="Matrícula" required value="{{$aluno->matricula}}">
                    <label for="nome">Nome</label><br>
                    <input id="nome" name="nome" type="text" placeholder="Nome" required value="{{$aluno->nome}}">
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="text" placeholder="Email" required value="{{$aluno->email}}">

                </div>
            </div>

            <div class="button flex-container">
                <div>
                    <button type="submit"  class="btn">Salvar</button>
                </div>
                <div>
                    <button class="btn red">Cancelar</button>
                </div>
            </div>
    </form>

</div>
@endsection

