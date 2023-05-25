@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Cadastro de Filme</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('filme.update', $filme->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" value="{{ $filme->nome }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="ano_lancamento">Ano de lançamento</label>
                    <input class="form-control" type="text" name="ano_lancamento" value="{{ $filme->ano_lancamento }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="diretor">Diretor</label>
                    <input class="form-control" type="text" name="diretor" value="{{ $filme->diretor }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="valor">Valor</label>
                    <input class="form-control" type="text" name="valor" id="valor" value="{{ $filme->valor }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="id_genero">Gênero</label>
                    <select class="form-control" name="id_genero" id="">
                        @foreach ($generos as $g)
                            <option value="{{ $g->id }}"
                                @if ($filme->id_genero == $g->id)
                                    selected
                                @endif>{{ $g->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="button">Salvar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $('#valor').mask('000.000.000,00', {reverse: true});
    </script>
@endsection
