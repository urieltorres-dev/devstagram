@extends('layouts.app')
<!-- Mandar titulo al contenedor de app -->
@section('titulo')
    Listado de grupos
@endsection
@section('contenido')

    Grupos de la UPV de TAI
        
            <!-- tabla para ver las publicaciones -->
            <div class="container grid px-6 mx-auto">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-3/4 mx-auto my-8 border border-black">
                            <thead>
                                <tr class="border-b border-black">
                                    <th class="px-4 py-3 border-r border-black">id</th>
                                    <th class="px-4 py-3 border-r border-black">nombre del grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                <tr class="text-gray-700 dark:text-gray-400 border-b border-black">
                                    <td class="px-4 py-3 border-r border-black">{{$grupo->id}}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$grupo->grupo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Formulario de registro -->
            <form action="{{route('grupos')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="grupo" class="mb-2 black uppercase text-gray-500 font-bold">Nombre del grupo</label>
                    <input id="grupo" name="grupo" type="text" placeholder="nombre del grupo" class="border p-3 w-full rounded tg
                        @error('grupo')
                            border-red-500
                        @enderror"
                        value="{{old('grupo')}}"
                    />
                    <!-- Mostrar directiva de nombre obligatorio-->
                    @error('grupo')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Registrar grupo" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rownded-lg"/>

            </form>

@endsection