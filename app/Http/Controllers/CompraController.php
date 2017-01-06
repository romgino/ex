<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Comprapedido;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Compra::orderBy('tipo_id','ASC')->get();
        $formItem = new Compra();
        $listTipo = Tipo::pluck('nome','id');
        $listPedido = Comprapedido::where('pendente','=',1)->pluck('tipo_id','id');

        return view('compras.index',compact('items','formItem','listTipo','listPedido'));
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
            'formDataentrada' =>'required',
            'formQtd' => 'required',
            'formTipo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->action('CompraController@index')->withErrors($validator)
                ->withInput();
        }else {
            $item = new Compra();
            $item->ref = $request->formRef;
            $item->notafiscal = $request->formNota;
            $item->dataentrada = $request->formDataentrada;
            $item->garantia = $request->formGarantia;
            $item->qtd = $request->formQtd;
            $item->qtdcompra = $request->formQtd;
            $item->obs = $request->formObs;
            $item->historico .= "<br> " . date('d-m-Y H:i') . " | " . $request->user
                . " | criação  <br>" . print_r($request->all(), true);

            //print_r($item->toArray());
            $item->save();
            return redirect()->action('CompraController@show', $item->id);
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
        $item = Compra::find($id);
        $formItem = $item;
        $listTipo = Tipo::pluck('nome','id');
        $listPedido = Comprapedido::where('pendente','=',1)->pluck('tipo_id','id');

        return view('compras.show',compact('item','formItem','listTipo','listPedido'));
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
        $validator = Validator::make($request->all(), [
            'formDataentrada' =>'required',
            'formQtd' => 'required',
            'formTipo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->action('CompraController@show',$id)->withErrors($validator)
                ->withInput();
        }else {
            $item = Compra::find($id);
            $item->ref = $request->formRef;
            $item->notafiscal = $request->formNota;
            $item->dataentrada = $request->formDataentrada;
            $item->garantia = $request->formGarantia;
            $item->qtd = $request->formQtd;
            $item->tipo_id = $request->formTipo;
            $item->comprapedido_id = $request->formPedido;
            $item->qtdcompra = $request->formQtd;
            $item->obs = $request->formObs;
            $item->historico .= "<br> " . date('d-m-Y H:i') . " | " . $request->user
                . " | criação  <br>" . print_r($request->all(), true);

            //print_r($item->toArray());
            $item->update();
            return redirect()->action('CompraController@show', $id);
        }
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
