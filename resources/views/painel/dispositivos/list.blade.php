@extends('painel.main')

@section('content')
<div class="wrapper-container">
    <div class="wrapper-header flex-container">
    <input type="search" name="" id="" placeholder="Pesquisar" class="form-control">
        @if(Auth::user()->permissao == 0)
        <a href="/dispositivo/edit" class="btn btn-primary"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
        @endif
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ambiente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dispositivos as $dispositivo)
            <tr>
                <td data-column="nome">{{$dispositivo->nome}}</td>
                <td data-column="nome">{{$dispositivo->ambiente->nome}}</td>
                <td class="flex-container">
                    <a href="/dispositivo/edit/{{$dispositivo->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>
                    <form action="dispositivo/{{$dispositivo->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href=""><img src="{{url('painel/img/delte.png')}}"></button>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
@endsection