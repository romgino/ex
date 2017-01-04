@extends('layouts.app')
@section('content')
    @include('estados.form')
    <br>

    @foreach($items as $item)
        <hr>
        {{$item->nome}} | {{$item->infor}} | <a href="{{url('/estado',$item->id)}}">
            <button>view</button></a>

    @endforeach


@endsection