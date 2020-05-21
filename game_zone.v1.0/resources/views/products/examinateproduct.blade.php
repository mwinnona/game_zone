

@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Mi cuenta') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection

@section('content')
    Aqui va las caracteristicas del producto seleccionado {{$products}}
    {{$products['name']}}
@endsection
@section('plugin')
   
@endsection