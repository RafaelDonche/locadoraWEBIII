@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Cadastro de gênero</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('genero.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-3">
                <label class="form-label" for="nome">Nome</label>
                <input class="form-control" type="text" name="nome">
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit" name="button">Salvar</button>
            </div>
        </form>
    </div>
@endsection
