<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $items = Cliente::orderBy('nome','ASC')->get();
        $formItem = new Cliente();
        return view('clientes.index',compact('formItem','items'));
    }
    public function store(Request $request){
        $item = new Cliente();
        print_r($request->all());

        $item->cpf = $request->formCpf;
        $item->nome = $request->formNome;
        $item->endereco = $request->formEndereco;
        $item->bairro = $request->formBairro;
        $item->cidade = $request->formCidade;
        $item->uf = $request->formUf;
        $item->cep = $request->formCep;
        $item->contato = $request->formContato;
        $item->fone = $request->formFone;
        $item->email = $request->formEmail;
        $item->contato2 = $request->formContato2;
        $item->fone2 = $request->formFone2;
        $item->email2 = $request->formEmail2;
        $item->obs = $request->formObs;
        $item->historico.= "<br> " . date('d-m-Y H:i') . " | " . $request->user
            ." | criação ";
        $item->save();

        return redirect()->action('ClienteController@show',$item->id);

    }
    public function show ($id){
        $item = Cliente::find($id);
        $formItem = $item;
        return view('clientes.show', compact('item','formItem'));
    }
    public function update(Request $request,$id){
        $item = Cliente::find($id);

        $item->cpf = $request->formCpf;
        $item->nome = $request->formNome;
        $item->endereco = $request->formEndereco;
        $item->bairro = $request->formBairro;
        $item->cidade = $request->formCidade;
        $item->uf = $request->formUf;
        $item->cep = $request->formCep;
        $item->contato = $request->formContato;
        $item->fone = $request->formFone;
        $item->email = $request->formEmail;
        $item->contato2 = $request->formContato2;
        $item->fone2 = $request->formFone2;
        $item->email2 = $request->formEmail2;
        $item->obs = $request->formObs;
        $item->historico.= "<br> " . date('d-m-Y H:i') . " | " . $request->_user
            ." | auterou <br> " . print_r($request->all(),true);

        $item->update();

        return redirect()->action('ClienteController@show',$id);
    }
    public function destroy($id){

    }

}
