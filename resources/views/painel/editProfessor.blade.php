@extends('painel.main')

@section('title', 'Editando:'.$professor->nome)

@section('content')

<div class="wrapper-container">
    <form class="form" action="/professor/update/{{$professor->id}}" method="POST">
        @csrf
        @method('PUT')
        <h1>Editar professor</h1>
            <div class="input-grup">
                <div  class="input-box">
                    <label for="matricula">Matrícula</label><br>
                    <input id="matricula" name="matricula" type="text" placeholder="Matrícula" required value="{{$professor->matricula}}">
                    <label for="nome">Nome</label><br>
                    <input id="nome" name="nome" type="text" placeholder="Nome" required value="{{$professor->nome}}">
                    <label for="email">Email</label><br>
                    <input id="email" name="email" type="text" placeholder="Email" required value="{{$professor->email}}">

                </div>
            </div>

            <div class="button flex-container">
                <div>
                    <button type="submit"  class="btn">Salvar</button>
                </div>
                <div>
                    <a href="/professor" class="btn red">Cancelar</a>
                </div>
            </div>
    </form>

</div>
@endsection

