@extends('layouts.app')
@section('content')

    {!! $item->nome !!}
    {!! $item->info !!}
    <hr>
    @include('tipos.form')



    @endsection