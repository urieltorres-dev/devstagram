@extends('layouts.app')
<!-- Mandar titulo al contenedor de app -->
@section('titulo')
    Página principal upv
@endsection
@section('contenido')
    <x-listar-post :posts="$posts" />
@endsection