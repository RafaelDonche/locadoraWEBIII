@extends('main')

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Envie uma mensagem para o cliente</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('cliente.enviarMensagem') }}" method="post">
            @csrf
            <input type="text" name="id" value="{{ $cliente->id }}" hidden>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" value="{{ $cliente->nome }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $cliente->email }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" for="mensagem">Mensagem</label>
                    <textarea class="form-control" name="mensagem" id="mensagem" rows="10"></textarea>
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit" name="button">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
    $('#cpf').mask('000.000.000-00');
    </script>
@endsection
