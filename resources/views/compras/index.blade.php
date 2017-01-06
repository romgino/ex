@extends('layouts.app')
@section('content')
    @include('compras.form')
    <hr>
    {{$items}}
@endsection