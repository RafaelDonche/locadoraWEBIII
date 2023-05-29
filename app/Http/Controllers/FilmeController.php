<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use App\Models\Locacao;
use App\Models\LocacaoFilme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $filmes = Filme::all();

            return view('filmes.index', compact('filmes'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            $generos = Genero::all();

            return view('filmes.create', compact('generos'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $filme = new Filme();
            $filme->nome = $request->nome;
            $filme->ano_lancamento = $request->ano_lancamento;
            $filme->diretor = $request->diretor;
            $filme->valor = str_replace(",", ".", str_replace(".", "", $request->valor));
            $filme->id_genero = $request->id_genero;

            if ($request->hasFile('imagem')) {
                $file = $request->file('imagem');
                $upload = $file->store('public/imagens');
                $upload = explode("/", $upload);
                $tamanho = sizeof($upload);
                $filme->imagem = $upload[$tamanho-1];
            }

            $filme->save();

            return redirect()->route('filme.index')->with('success', 'Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function show(Filme $filme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $generos = Genero::all();

            $filme = Filme::find($id);

            return view('filmes.edit', compact('generos', 'filme'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $filme = Filme::find($id);
            $filme->nome = $request->nome;
            $filme->ano_lancamento = $request->ano_lancamento;
            $filme->diretor = $request->diretor;
            $filme->valor = str_replace(",", ".", str_replace(".", "", $request->valor));
            $filme->id_genero = $request->id_genero;

            if ($request->hasFile('imagem')) {

                Storage::delete("public/imagens/".$filme->imagem);
                $filme->imagem = null;

                $file = $request->file('imagem');
                $upload = $file->store('public/imagens');
                $upload = explode("/", $upload);
                $tamanho = sizeof($upload);
                $filme->imagem = $upload[$tamanho-1];
            }

            $filme->save();

            return redirect()->route('filme.index')->with('success', 'Cadastro editado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filme  $filme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $filme = Filme::find($id);

            $locacoes = LocacaoFilme::where('id_filme', $filme->id)->get();


            if (isset($locacoes[0])) {
                return redirect()->route('filme.index')
                ->with('error', 'Este filme possui locações cadastradas, não será possivel excluir!');
            }

            $filme->delete();

            return redirect()->route('filme.index')->with('success', 'Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
