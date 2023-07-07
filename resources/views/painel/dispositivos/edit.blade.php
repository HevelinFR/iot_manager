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
    <form class="form" action="{{ isset($dispositivo) ? route('dispositivo.update', $dispositivo->id) : route('dispositivo.store') }}" method="POST">
        @csrf
        @if(isset($dispositivo))
        @method('PUT')
        @endif
        <h1 class="h4 text-gray-900 mb-4">{{ isset($dispositivo) ? 'Editar Dispositivo' : 'Criar Dispositivo' }}</h1>
        <div class="form-group row">
            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome" required value="{{ isset($dispositivo) ? $dispositivo->nome : '' }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label><br>
                <textarea class="form-control" name="descricao" id="descricao" required>{{ isset($dispositivo) ? $dispositivo->descricao : '' }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-4">
                <label for="ambiente">Ambiente</label><br>
                <select name="id_ambiente" id="id_ambiente" class="form-control">
                    <option>Selecione o ambiente</option>
                    @foreach($ambientes as $ambiente)
                    <option value="{{ $ambiente->id }}" selected="{{isset($dispositivo) ? $dispositivo->id_ambiente == $ambiente->id ? 'selected' : '' : '' }}">{{ $ambiente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4">
                <label for="comparacao">comparacao</label><br>
                <select name="id_comparacao" id="comparacao" class="form-control">
                    <option>Selecione a comparacao</option>
                    @foreach( $comparacoes as $comparacao)
                    <option value="{{ $comparacao->id }}" selected="{{ isset($dispositivo) ? $dispositivo->id_comparacao == $comparacao->id ? 'selected' : '' : '' }}">{{ $comparacao->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-4">
                <label for="valor">Valor</label><br>
                <input class="form-control" id="valor" name="valor_comparacao" type="text" placeholder="Valor" required value="{{ isset($dispositivo) ? $dispositivo->regra->valor : '' }}">
            </div>
        </div>

        <div class="button flex-container">
            <div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Salvar</button>
            </div>
            <div>
                <a href="/dispositivo" class="btn red">Cancelar</a>
            </div>
        </div>
</div>
</form>
@endsection