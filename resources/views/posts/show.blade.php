@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')

    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del Post " {{$post->titulo}} />
        
            <div class="p-3 flex items-center gap-2">

                @auth
                    @if ($post->checkLike(auth()->user()))
                        <form action="{{route('post.likes.destroy', $post)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="flex gap-2 items-center">
                                <button wire:click="like">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{route('post.likes.store', $post)}}" method="POST">
                            @csrf
                            <div class="flex gap-2 items-center">
                                <button wire:click="like">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif
                @endauth
                <p class="font-bold">{{$post->likes->count()}} <span class="font-normal">Likes</span></p>
            </div>

            <div>
                <p class="font-bold">{{$user->username}}</p> 
                <p class="text-sm text-gray-500">
                    <!--Utilizamos libreria carbon para obtener la fecha de publicación de post -->
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id )
                    <form method="POST" action="{{ route('post.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            class="bg-red-500 uppercase p-3 mt-4 hover:bg-red-600 text-white rounded-md font-bold cursor-pointer"
                            value="Eliminar publicación"
                            >
                    </form>
                @endif
            @endauth
        </div>
    
        <!--Añadir caja de comentarios-->
        <div class="md:w-1/2 p-5">
            <!--Mostrar formulario de comentarios para usuarios autenticados-->
            @auth
                <div class="shadow bg-white p-5 mb-5">

                    <p class="text-xl font-bold text-center mb-4">Agrega nuevo comentario</p>

                    @if(session('mensaje'))
                        <div class="bg-green-500 text-white rounded-lg text-center mb-6 p-2 uppercase font-bold">
                            {{session('mensaje')}}
                        </div>
                    @endif

                    <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user])}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 uppercase text-gray-500 font-bold">
                                Añade un comentario
                            </label>
                            <textarea name="comentario" id="comentario" placeholder="Agrega un comentario"
                                class="border p-3 w-full rounded-lg
                                @error('comentario')
                                    border-red-500
                                @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                                    {{$message}}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                            uppercase font-bold w-full p-3 text-white rounded-lg" />
                    </form>
                </div>
            @endauth
            <!-- Imprimir los comentarios que tiene el Post de publicación -->
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                <!-- Revisamos si existen comentarios -->
                @if ($post->comentarios()->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="p-5 border-gray-300 border-b flex justify-between items-center">
                            <!-- Imprimimos el usuario que cuenta y le ponemos un vinculo a su perfil -->
                            <div class="">
                                <a href="{{route('post.index', $comentario->user)}}" class="font-bold">
                                    {{$comentario->user->username}}
                                </a>
                                <p>{{$comentario->comentario}}</p>
                                <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                            </div>
                            <!-- Eliminar comentarios -->
                            <div class="">
                                @auth
                                    @if (auth()->user()->id === $comentario->user->id)
                                        <form action="{{route('comentarios.destroy', $comentario)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit"
                                            value="Eliminar comentario"
                                            class="bg-red-500 hover:bg-red-600 transition-colors text-white p-2 rounded-lg cursor-pointer" />
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No hay comentarios aún.</p>
                @endif
            </div>
        </div>
    </div>

@endsection