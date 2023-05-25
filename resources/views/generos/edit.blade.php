@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Edição de Gênero</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('genero.update', $genero->id) }}" method="post">
            @csrf
            <div class="col-md-6 mb-3">
                <label class="form-label" for="nome">Nome</label>
                <input class="form-control" type="text" name="nome" value="{{ $genero->nome }}">
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit" name="button">Salvar</button>
            </div>
        </form>
    </div>
@endsection
