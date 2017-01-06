@extends('layouts.app')
@section('content')
    {{$item}}
    <hr>
    {{ $item->tipo->nome }}
    {{ $item->user->name }}

    <hr>
    @include('comprapedidos.form')

    @endsection