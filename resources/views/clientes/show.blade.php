@extends('layouts.app')
@section('content')
{{$item}}
<hr>

{{--{!! $item->historico  !!}--}}
<hr>
    @include('clientes.form')

@endsection