@extends('main')

@section('conteudo')
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-2">
        <h1>Listagem de filmes</h1>
        <a href="{{ route('filme.create') }}" class="btn btn-primary">Novo</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Capa</th>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Ano de lançamento</th>
                <th>Diretor</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filmes as $f)
            <tr>
                <td>{{ $f->id }}</td>
                <td>
                    @if ($f->src_img() != '')
                        <img style="width: 100px; height: 130px;" src="{{ $f->src_img() }}">
                    @endif
                </td>
                <td>{{ $f->nome }}</td>
                <td>{{ $f->genero->nome }}</td>
                <td>{{ $f->ano_lancamento }}</td>
                <td>{{ $f->diretor }}</td>
                <td>{{ number_format($f->valor,2,',','.')}}</td>
                <td class="d-flex">
                    <a class="btn btn-secondary m-1" href="{{ route('filme.edit', $f->id) }}">Editar</a>
                    <a class="btn btn-danger m-1" href="{{ route('filme.destroy', $f->id) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
