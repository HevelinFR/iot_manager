@extends('painel.main')

@section('content')
<div class="wrapper-container">
    <div class="wrapper-header flex-container">
        <input type="search" name="" id="" placeholder="Pesquisar">
        @if(Auth::user()->permissao == 0)
        <a href="/ambiente/edit" class="btn"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ambientes as $ambiente)
            <tr>
                <td data-column="nome">{{$ambiente->nome}}</td>
                <td class="flex-container">
                    <a href="/ambiente/edit/{{$ambiente->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>
                    <form action="ambiente/{{$ambiente->id}}" method="POST">
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