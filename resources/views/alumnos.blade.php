@extends('layouts.app')
<!-- Mandar titulo al contenedor de app -->
@section('titulo')
    Listado de alumnos
@endsection
@section('contenido')

    Alumnos de la UPV de TAI
        
            <!-- tabla para ver las publicaciones -->
            <div class="container grid px-6 mx-auto">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-3/4 mx-auto my-8 border border-black">
                            <thead>
                                <tr class="border-b border-black">
                                    <th class="px-4 py-3 border-r border-black">id</th>
                                    <th class="px-4 py-3 border-r border-black">nombre</th>
                                    <th class="px-4 py-3 border-r border-black">apellidos</th>
                                    <th class="px-4 py-3 border-r border-black">fecha_nacimiento</th>
                                    <th class="px-4 py-3 border-r border-black">grupo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                <tr class="text-gray-700 dark:text-gray-400 border-b border-black">
                                    <td class="px-4 py-3 border-r border-black">{{$alumno->id}}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$alumno->nombre}}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$alumno->apellido }}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$alumno->fecha_nacimiento }}</td>
                                    <td class="px-4 py-3 border-r border-black">{{$alumno->grupo_id }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Formulario de registro -->
            <form action="{{route('alumnos')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="mb-2 black uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Tu nombre" class="border p-3 w-full rounded tg
                        @error('nombre')
                            border-red-500
                        @enderror"
                        value="{{old('nombre')}}"
                    />
                    <!-- Mostrar directiva de nombre obligatorio-->
                    @error('nombre')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="apellido" class="mb-2 black uppercase text-gray-500 font-bold">Apellido</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Tu apellido" class="border p-3 w-full rounded tg
                        @error('apellido')
                            border-red-500
                        @enderror"
                        value="{{old('apellido')}}"
                    />
                    <!-- Mostrar directiva de username obligatorio-->
                    @error('apellido')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="fecha_nacimiento" class="mb-2 black uppercase text-gray-500 font-bold">Fecha de nacimiento</label>
                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="Tu fecha de nacimiento" class="border p-3 w-full rounded tg
                        @error('fecha_nacimiento')
                            border-red-500
                        @enderror"
                        value="{{old('fecha_nacimiento')}}"
                    />
                    <!-- Mostrar directiva de email obligatorio-->
                    @error('fecha_nacimiento')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="grupo_id" class="mb-2 black uppercase text-gray-500 font-bold">Grupo</label>
                    <select id="grupo_id" name="grupo_id" class="border p-3 w-full rounded tg
                        @error('grupo_id')
                            border-red-500
                        @enderror">
                        <option value="">Seleccione el grupo</option>
						@foreach ($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->grupo}}</option>
                        @endforeach
					</select>
                    <!-- Mostrar directiva de password obligatorio-->
                    @error('grupo_id')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Registrar alumno" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rownded-lg"/>

            </form>

@endsection