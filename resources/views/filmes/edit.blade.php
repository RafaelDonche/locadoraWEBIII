@extends('main')

<style>
    .img {
        border: 0.7px black solid;
        height: 100%;
    }
    img {
        width: 300px;
        height: 550px;
    }
</style>

@section('conteudo')
    <div class="col-md-12 mb-2">
        <h1>Ediçao de Filme</h1>
    </div>
    <div class="col-md-12">
        <form action="{{ route('filme.update', $filme->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 p-2 text-center img">
                    <img src="{{ $filme->src_img() != '' ? $filme->src_img() : asset('sample/capadofilme.jpg') }}" alt="" id="imgCapa">
                </div>
                <div class="col-md-8">
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="nome">Nome</label>
                        <input class="form-control" type="text" name="nome" value="{{ $filme->nome }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="ano_lancamento">Ano de lançamento</label>
                        <input class="form-control" type="text" name="ano_lancamento" value="{{ $filme->ano_lancamento }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="diretor">Diretor</label>
                        <input class="form-control" type="text" name="diretor" value="{{ $filme->diretor }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="valor">Valor</label>
                        <input class="form-control" type="text" name="valor" id="valor" value="{{ $filme->valor }}">
                    </div>
                    <div class="col-md-12 mb-3">
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
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="imagem">Capa</label>
                        <input class="form-control" type="file" name="imagem" accept="image/*" id="fileCapa">
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit" name="button">Salvar</button>
                        <a class="btn btn-secondary" onclick="history.back()">Salvar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $('#valor').mask('000.000.000,00', {reverse: true});

        //código referente a capa do filme
        let img = document.getElementById('imgCapa');
        let file = document.getElementById('fileCapa');

        img.addEventListener('click', () => {
            file.click();
        });

        file.addEventListener('change', () => {

            if (file.files.length <= 0) {
                return;
            }

            let reader = new FileReader();

            reader.onload = () => {
                img.src = reader.result;
            }

            reader.readAsDataURL(file.files[0]);
        });
    </script>
@endsection
