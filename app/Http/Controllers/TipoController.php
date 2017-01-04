<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tipo::orderBy('nome','ASC')->get();
        $formItem = new Tipo();

        return view('tipos.index', compact('items','formItem'));
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
        'formNome' => 'unique:tipos,nome',
        'formInfo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->action('TipoController@index')->withErrors($validator)
                ->withInput();
        }else {
            $item = new Tipo();

            $item->nome = $request->formNome;
            $item->info = $request->formInfo;
            $item->save();
            return redirect()->action('TipoController@index');
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
        $item = Tipo::find($id);
        $formItem = $item;
        return view('tipos.show',compact('item','formItem'));
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
            'formNome' => 'required',
            'formInfo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->action('TipoController@show', $id)->withErrors($validator)
                ->withInput();
        }else {
            $item = Tipo::find($id);

            $item->nome = $request->formNome;
            $item->info = $request->formInfo;

            $item->update();

            return redirect()->action('TipoController@show', $item->id);
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
