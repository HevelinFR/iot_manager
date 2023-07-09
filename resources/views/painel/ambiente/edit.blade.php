@extends('painel.main')

@section('content')


<style>
    .form {
        display: block;
    }
</style>
<div class="wrapper-container">
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form class="form" action="{{ isset($ambiente) ? route('ambientes.update', $ambiente->id) : route('ambientes.store') }}" method="POST">
        @csrf
        @if(isset($ambiente))
        @method('PUT')
        @endif
        <h1 class="h4 text-gray-900 mb-4">{{ isset($ambiente) ? 'Editar Ambiente' : 'Criar Ambiente' }}</h1>
        <div class="input-grup">
            <div class="form-group row">
                <label for="nome">Nome</label><br>
                <input id="nome" name="nome" class="form-control mb-4" type="text" placeholder="Nome" required value="{{ isset($ambiente) ? $ambiente->nome : '' }}">

                <label for="descricao">Descrição</label><br>
                <textarea name="descricao" class="form-control" id="descricao" required>{{ isset($ambiente) ? $ambiente->descricao : '' }}</textarea>
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
    </form>
</div>

@endsection