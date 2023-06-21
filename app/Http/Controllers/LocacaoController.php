<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Filme;
use App\Models\Locacao;
use App\Models\LocacaoFilme;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $locacoes = Locacao::all();

            return view('locacoes.index', compact('locacoes'));

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

            $clientes = Cliente::all();
            $filmes = Filme::all();

            return view('locacoes.create', compact('clientes', 'filmes'));

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

            $locacao = new Locacao();
            $locacao->data_emprestimo = $request->data_emprestimo;
            $locacao->data_devolucao = $request->data_devolucao;
            $locacao->id_cliente = $request->id_cliente;
            $locacao->save();

            $filmes = $request->id_filme;

            foreach ($filmes as $f) {
                $filme_locado = new LocacaoFilme();
                $filme_locado->id_locacao = $locacao->id;
                $filme_locado->id_filme = $f;
                $filme_locado->save();
            }

            return redirect()->route('locacao.index')->with('success', 'Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function show(Locacao $locacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $clientes = Cliente::all();
            $filmes = Filme::all();

            $locacao = Locacao::find($id);
            $filmes_locados = LocacaoFilme::where('id_locacao', $id)->get();

            return view('locacoes.edit', compact('clientes', 'filmes', 'locacao', 'filmes_locados'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $locacao_filme = LocacaoFilme::where('id_locacao', $id)->get();

            foreach ($locacao_filme as $l) {
                $l->delete();
            }

            $locacao = Locacao::find($id);
            $locacao->data_emprestimo = $request->data_emprestimo;
            $locacao->data_devolucao = $request->data_devolucao;
            $locacao->id_cliente = $request->id_cliente;
            $locacao->save();

            $filmes = $request->id_filme;

            foreach ($filmes as $f) {
                $filme_locado = new LocacaoFilme();
                $filme_locado->id_locacao = $locacao->id;
                $filme_locado->id_filme = $f;
                $filme_locado->save();
            }

            return redirect()->route('locacao.index')->with('success', 'Cadastro editado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $gen = Locacao::find($id);
            $gen->delete();

            return redirect()->route('locacao.index')->with('success', 'Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function relatorio()
    {
        try {
            $locacoes = Locacao::all();
            $pdf = Pdf::loadView('locacoes.relatorio', compact('locacoes'))->setPaper('a4', 'landscape');
            return $pdf->stream('locações.pdf');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
