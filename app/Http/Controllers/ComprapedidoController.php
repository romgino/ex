<?php

namespace App\Http\Controllers;

use App\Comprapedido;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComprapedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Comprapedido::orderBy('tipo_id','ASC')->get();
        $formItem = new Comprapedido();
        $listTipo = Tipo::pluck('nome', 'id');

        return view('comprapedidos.index',compact('items','formItem','listTipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'formQtd' => 'required',
            'formTipo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->action('ComprapedidoController@index')->withErrors($validator)
                ->withInput();
        }else {
            $item = new  Comprapedido();
            $item->ref = $request->formRef;
            $item->qtd = $request->formQtd;
            $item->obs = $request->formObs;
            $item->tipo_id = $request->formTipo;
            $item->user_id = intval($request->_user);

            $item->historico .= "<br> " . date('d-m-Y H:i') . " | " . $request->user
                . " | criação  <br>" . print_r($request->all(), true);

            $item->save();
            return redirect()->action('ComprapedidoController@show', $item->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Comprapedido::find($id);
        $formItem = $item;
        $listTipo = Tipo::pluck('nome', 'id');
        return view('comprapedidos.show', compact('item' , 'formItem','listTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Comprapedido::find($id);

        $item->ref = $request->formRef;
        $item->qtd = $request->formQtd;
        $item->obs = $request->formObs;
        $item->tipo_id = $request->formTipo;
        $item->user_id = intval($request->_user);
        $item->historico.= "<br> " . date('d-m-Y H:i') . " | " . $request->user
            ." | auterou <br> " . print_r($request->all(),true);

        $item->update();
        return redirect()->action('ComprapedidoController@show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
