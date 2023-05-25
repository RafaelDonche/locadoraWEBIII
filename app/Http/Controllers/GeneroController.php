<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $generos = Genero::all();

            return view('generos.index', compact('generos'));

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

            return view('generos.create');

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

            $gen = new Genero();
            $gen->nome = $request->nome;
            $gen->save();

            return redirect()->route('genero.index')->with('success', 'Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $genero = Genero::find($id);

            return view('generos.edit', compact('genero'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $gen = Genero::find($id);
            $gen->nome = $request->nome;
            $gen->save();

            return redirect()->route('genero.index')->with('success', 'Cadastro editado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $gen = Genero::find($id);

            $filmes = Filme::where('id_genero', $gen->id)->get();

            if (isset($filmes[0])) {
                return redirect()->route('genero.index')
                ->with('error', 'Este gênero possui filmes cadastrados, não será possivel excluir!');
            }

            $gen->delete();

            return redirect()->route('genero.index')->with('success', 'Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
