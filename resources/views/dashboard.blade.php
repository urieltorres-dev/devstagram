@extends('layouts.app')

<!--Integramos username-->
@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{  $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" alt="Imagen de usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">

                <div class="flex items-center gap-2">
                <p class="text-gray-700 text-2xl">{{$user->username}}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-700 transition-transform hover:scale-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Añadir mas contenido-->
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers->count() }}
                    <span class="font-normal"> @choice('Seguidor|Seguidores', $user->followers->count()) </span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followings->count() }}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->posts->count() }}
                    <span class="font-normal">Post</span>
                </p>

                @auth
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->siguiendo(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit"
                                    class="bg-sky-600 mt-2 rounded-md cursor-pointer text-white uppercase px-3 py-1 font-bold"
                                    value="Seguir">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit"
                                    class="bg-red-600 mt-2 rounded-md cursor-pointer text-white uppercase px-3 py-1 font-bold"
                                    value="Dejar de seguir">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>

            <!--
            tabla para ver las publicaciones
            <div class="container grid px-6 mx-auto">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-3/4 mx-auto my-8 border border-black">
                            <thead>
                                <tr class="border-b border-black">
                                    <th class="px-4 py-3 border-r border-black">Titulo</th>
                                    <th class="px-4 py-3 border-r border-black">Descripción</th>
                                    <th class="px-4 py-3 border-r border-black">Imagen</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr class="text-gray-700 dark:text-gray-400 border-b border-black">
                                    <td class="px-4 py-3 border-r border-black">{{$post->titulo}}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$post->descripcion}}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$post->imagen }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            -->

        </div>
    </div>

    <!--Recibir y mostrar los Post de publicación, se reciben desde PostController-->
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        
        <x-listar-post :posts="$posts" />
        
    </section>

@endsection