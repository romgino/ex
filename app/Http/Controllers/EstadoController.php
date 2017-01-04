<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;


class EstadoController extends Controller
{
    public function index(){
        $items =  Estado::orderBy('id','DESC')->get(); //Estado::all();
        $formItem = new Estado();
        return view('estados.index',compact('items','formItem'));
    }
    public function show ($id){
        $item = Estado::find($id);
        $formItem = $item;
        return view('estados.show', compact('item','formItem'));
    }
    public function store(Request $request){
        $item = new Estado();
        $item->nome = $request->formEstado;
        $item->infor = $request->formInfor;
        $item->save();

        return redirect()->action('EstadoController@index');
    }
    public function update(Request $request,$id){
        $item = Estado::find($id);
        $item->nome = $request->formEstado;
        $item->infor = $request->formInfor;
        $item->update();

        return redirect()->action('EstadoController@show',$id);
    }
    public function destroy($id){

    }

}
