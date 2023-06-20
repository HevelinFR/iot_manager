@extends('painel.main')

@section('content')
    <div class="wrapper-container">
        <div class="wrapper-header flex-container">
            <input type="search" name="" id="" placeholder="Pesquisar">
            @if(Auth::user()->permissao == 0)
                <a href="adicionar-professor" class="btn"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
            @endif
        </div>
        <table>
            <thead>
                <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professores as $professor)
                    <tr>
                        <td data-column="matricula">{{$professor->matricula}}</td>
                        <td data-column="nome">{{$professor->nome}}</td>
                        <td data-column="email">{{$professor->email}}</td>
                        <td class="flex-container"><a href="/professor/edit/{{$professor->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>

                            <form action="professor/{{$professor->id}}" method="POST">
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
