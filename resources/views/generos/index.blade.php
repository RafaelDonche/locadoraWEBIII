@extends('main')

@section('conteudo')
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-2">
        <h1>Listagem de Gêneros</h1>
        <a href="{{ route('genero.create') }}" class="btn btn-primary">Novo</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generos as $g)
            <tr>
                <td>{{$g->id}}</td>
                <td>{{$g->nome}}</td>
                <td class="d-flex">
                    <a class="btn btn-secondary m-1" href="{{ route('genero.edit', $g->id) }}">Editar</a>
                    <a class="btn btn-danger m-1" href="{{ route('genero.destroy', $g->id) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
