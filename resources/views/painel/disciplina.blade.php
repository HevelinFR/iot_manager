@extends('painel.main')

@section('title', 'Disciplina')

@section('content')
    <div class="wrapper-container">
        <div class="wrapper-header flex-container">
            <input type="search" name="" id="" placeholder="Pesquisar">
            <a href="/disciplina/adicionar" class="btn"><img src="{{url('painel/img/add.png')}}" alt=""> Adicionar</a>
        </div>
        <table>
            <thead>
                <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($disciplina as $disciplina)
                <tr>
                <td data-column="codigo">{{$disciplina->cod_disciplina}}</td>
                <td data-column="nome">{{$disciplina->nome}}</td>
                <td class="flex-container"><a href="/disciplina/edit/{{$disciplina->id}}"><img src="{{url('painel/img/Edit.png')}}"></a>

                   <form action="disciplina/{{$disciplina->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" href=""><img src="{{url('painel/img/delte.png')}}"></button>
                    </form>
                </tr>
            @endforeach
            </tbody>
            </table>

    </div>
@endsection
