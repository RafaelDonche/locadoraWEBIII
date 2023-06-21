<?php

namespace App\Http\Controllers;

use App\Mail\ClienteMensagem;
use App\Models\Cliente;
use App\Models\Locacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $clientes = Cliente::all();

            return view('clientes.index', compact('clientes'));

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

            return view('clientes.create');

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

            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;
            $cliente->data_nascimento = $request->data_nascimento;
            $cliente->save();

            return redirect()->route('cliente.index')->with('success', 'Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {

            $cliente = Cliente::find($id);

            return view('clientes.edit', compact('cliente'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $cliente = Cliente::find($id);
            $cliente->nome = $request->nome;
            $cliente->cpf = $request->cpf;
            $cliente->email = $request->email;
            $cliente->data_nascimento = $request->data_nascimento;
            $cliente->save();

            return redirect()->route('cliente.index')->with('success', 'Cadastro editado com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $cliente = Cliente::find($id);

            $locacoes = Locacao::where('id_cliente', $cliente->id)->get();

            if (isset($locacoes[0])) {
                return redirect()->route('cliente.index')
                ->with('error', 'Este cliente possui locações cadastradas, não será possivel excluir!');
            }

            $cliente->delete();

            return redirect()->route('cliente.index')->with('success', 'Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function mensagem($id)
    {
        try {

            $cliente = Cliente::find($id) ;
            return view('clientes.mensagem', compact('cliente'));

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function enviarMensagem(Request $request)
    {
        try {

            $cliente = Cliente::find($request->input('id'));
            Mail::to($cliente->email)->send(new ClienteMensagem($cliente, $request->input('mensagem')));

            return redirect()->route('cliente.index')->with('success', 'Mensagem enviada com sucesso!');

        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
