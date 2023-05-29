@extends('main')

@section('conteudo')
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-2">
        <h1>Listagem de locações</h1>
        <a href="{{ route('locacao.create') }}" class="btn btn-primary">Novo</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Data do empréstimo</th>
                <th>Prazo de devolução</th>
                <th>Filmes</th>
                <th>Valor total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locacoes as $l)
            @php
                $total = 0;
            @endphp
            <tr>
                <td>{{$l->id}}</td>
                <td>{{$l->cliente->nome}}</td>
                <td>{{ date('d/m/Y', strtotime($l->data_emprestimo)) }}</td>
                <td>{{ date('d/m/Y', strtotime($l->data_devolucao)) }}</td>
                <td>
                    @foreach ($l->filmes as $filmes)
                        {{ $filmes->filme->nome }} <br>
                    @endforeach
                </td>
                <td>
                    @foreach ($l->filmes as $filmes)
                    @php
                        $total = $total + $filmes->filme->valor;
                    @endphp
                    @endforeach
                    {{ $total }}
                </td>
                <td class="d-flex">
                    <a class="btn btn-secondary m-1" href="{{ route('locacao.edit', $l->id) }}">Editar</a>
                    <a class="btn btn-danger m-1" href="{{ route('locacao.destroy', $l->id) }}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
