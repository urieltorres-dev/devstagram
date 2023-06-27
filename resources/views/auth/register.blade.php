@extends('layouts.app')

@section('titulo')
    Registrate a Devstagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap=10 md:items-center">
        <div class="md:w-6/12 p-5">
            <!-- Utilizamos un asset el cual accede a una carpeta publica -->
            <img src="{{ asset('img/registrar.jpg')}}" alt="Imagen de registro de usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <!-- Formulario de registro -->
            <form action="{{"register"}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 black uppercase text-gray-500 font-bold">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre" class="border p-3 w-full rounded tg
                        @error('name')
                            border-red-500
                        @enderror"
                        value="{{old('name')}}"
                    />
                    <!-- Mostrar directiva de nombre obligatorio-->
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 black uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded tg
                        @error('username')
                            border-red-500
                        @enderror"
                        value="{{old('username')}}"
                    />
                    <!-- Mostrar directiva de username obligatorio-->
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 black uppercase text-gray-500 font-bold">Correo electronico</label>
                    <input id="email" name="email" type="text" placeholder="Tu email de registro" class="border p-3 w-full rounded tg
                        @error('email')
                            border-red-500
                        @enderror"
                        value="{{old('email')}}"
                    />
                    <!-- Mostrar directiva de email obligatorio-->
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 black uppercase text-gray-500 font-bold">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Tu contraseña" class="border p-3 w-full rounded tg
                        @error('password')
                            border-red-500
                        @enderror"
                    />
                    <!-- Mostrar directiva de password obligatorio-->
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 black uppercase text-gray-500 font-bold">Repetir contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu contraseña" class="border p-3 w-full rounded tg
                    @error('password_confirmation')
                            border-red-500
                    @enderror"
                    />
                    <!-- Mostrar directiva de password_confirmation obligatorio-->
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg textsm p-2 text-center">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rownded-lg"/>

            </form>
        </div>
    </div>
@endsection