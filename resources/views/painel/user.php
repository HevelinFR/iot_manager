@extends('painel.main')

@section('content')

<div class="wrapper-container">
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf
        @method('PUT')
        <h1 class="h4 text-gray-900 mb-4">Detalhes do usuário</h1>
        <div class="input-grup">
            <div class="form-group row">
                <label for="nome">Nome</label><br>
                <input id="nome" name="name" class="form-control mb-4" type="text" placeholder="Nome" required value="{{}}">

                <label for="descricao">E-mail</label><br>
                <input id="nome" name="email" class="form-control mb-4" type="text" placeholder="E-mail" required value="{{}}">
            </div>
        </div>

        <div class="button flex-container">
            <div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Salvar</button>
            </div>
            <div>
                <a href="/ambiente" class="btn red">Cancelar</a>
            </div>
        </div>
</div>
@endsection