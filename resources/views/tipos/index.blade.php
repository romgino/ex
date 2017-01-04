@extends('layouts.app')
@section('content')
     @include('tipos.form')
     <hr>
     @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
     @endforeach
     <br>
    para nome: {!! $errors->first('formNome') !!}
     <br>para a descrição: {!! $errors->first('formInfo') !!}
     <hr>
    {{ $items }}
    @endsection