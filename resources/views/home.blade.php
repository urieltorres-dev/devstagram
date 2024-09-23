@extends('layouts.app')
<!-- Mandar titulo al contenedor de app -->
@section('titulo')
    Página principal upv
@endsection
@section('contenido')
@if ($posts->count())
<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div>
            <!--Pasamos el valor de las variables post y username al URL-->
            <a href="{{route('post.show' , ['post' => $post, 'user' => $post->user])}}">
                <img src="{{asset('uploads'.'/'.$post->imagen)}}" alt="Imagen del Post {{$post->titulo}}">
            </a>
        </div>
    @endforeach
</div>

<!-- Paginación de los post-->
<div class="container mx-auto my-10">
    {{$posts->links()}}
</div>

@else
<p class="text-gray-600 uppercase text-sm text-center font-bold"> No existen publicaciones</p>
@endif
@endsection