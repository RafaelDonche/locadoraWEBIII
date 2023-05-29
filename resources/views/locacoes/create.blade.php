@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Cadastro de locações</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('locacao.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="data_emprestimo">Data de empréstimo</label>
                    <input class="form-control" type="date" name="data_emprestimo" id="data_emprestimo">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="data_devolucao">Prazo de devolução</label>
                    <input class="form-control" type="date" name="data_devolucao" id="data_devolucao">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="id_cliente">Cliente</label>
                    <select class="form-control" name="id_cliente" id="">
                        @foreach ($clientes as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="id_filme">Filme</label>
                    <select class="form-select" name="id_filme[]" id="id_filme" multiple>
                        @foreach ($filmes as $f)
                            <option value="{{ $f->id }}">{{ $f->nome }}</option>
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
        $(document).ready(function() {
            $('#id_filme').select2();

            let currentDate = new Date().toJSON().slice(0, 10);
            document.getElementById("data_emprestimo").value = currentDate;
        });
    </script>
@endsection
