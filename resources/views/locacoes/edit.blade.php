@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Edição de locações</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('locacao.update', $locacao->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="data_emprestimo">Data de empréstimo</label>
                    <input class="form-control" type="date" name="data_emprestimo" value="{{ $locacao->data_emprestimo }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="data_devolucao">Prazo de devolução</label>
                    <input class="form-control" type="date" name="data_devolucao" value="{{ $locacao->data_devolucao }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="id_cliente">Cliente</label>
                    <select class="form-control" name="id_cliente" id="">
                        @foreach ($clientes as $c)
                            <option value="{{ $c->id }}"
                                @if ($locacao->id_cliente == $c->id)
                                    selected
                                @endif>{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="id_filme">Filme</label>
                    <select class="form-control" name="id_filme" id="">
                        @foreach ($filmes as $f)
                            <option value="{{ $f->id }}"
                                @foreach ($filmes_locados as $floc)
                                    @if ($floc->id_filme == $f->id)
                                        selected
                                    @endif
                                @endforeach
                            >{{ $f->nome }}</option>
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
        $('#cpf').mask('000.000.000-00');
    </script>
@endsection
