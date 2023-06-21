@extends('main')

@section('conteudo')
    <div class="col-md-12 d-flex justify-content-between align-items-center mb-2">
        <h1>Listagem de clientes</h1>
        <a href="{{ route('cliente.create') }}" class="btn btn-primary">Novo</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->nome}}</td>
                <td>{{$c->cpf}}</td>
                <td>{{$c->email}}</td>
                <td>{{ date('d/m/Y', strtotime($c->data_nascimento)) }}</td>
                <td>
                    <a class="btn btn-secondary m-1" href="{{ route('cliente.edit', $c->id) }}">Editar</a>
                    <a class="btn btn-danger m-1" href="{{ route('cliente.destroy', $c->id) }}">Excluir</a>
                    <a class="btn btn-info m-1" href="{{ route('cliente.mensagem', $c->id) }}">Mensagem</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
