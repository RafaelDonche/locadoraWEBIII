@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Cadastro de cliente</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('cliente.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="cpf">CPF</label>
                    <input class="form-control" type="text" name="cpf" id="cpf">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="data_nascimento">Data de nascimento</label>
                    <input class="form-control" type="date" name="data_nascimento">
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
