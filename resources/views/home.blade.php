@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">estoque</div>

                <div class="panel-body">
                    <ul>
                        <li> <a href="{{ URL('/compra')}}">entrada no estoque</a></li>

                    </ul>



                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">solicitação</div>

                <div class="panel-body">
                    <ul>
                        <li> <a href="{{ URL('/comprapedido')}}">pedido de compras</a></li>

                    </ul>



                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">configuração base</div>

                <div class="panel-body">
                    <ul>
                        <li> <a href="{{ URL('/estado')}}">estado</a></li>
                        <li><a href="{{ URL('/cliente')}}">cliente</a></li>
                        <li><a href="{{ URL('/tipo')}}">tipos de materiais</a></li>
                    </ul>



                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
