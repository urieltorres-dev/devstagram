@extends('layouts.app')
<!-- Mandar titulo al contenedor de app -->
@section('titulo')
    Curriculum vitae
@endsection

@section('img')
    <img src="{{ asset('img/Imagen1.png') }}" alt="Hernando Uriel Torres de Luna Técnico en Programación.">
@endsection

@section('datosCurriculares')
    Datos curriculares:
@endsection

@section('nombre')
    <b>Nombre:</b> Hernando Uriel Torres de Luna
@endsection

@section('profecion')
    <b>Titulo:</b> Técnico en programación.
@endsection

@section('direccion')
    <b>Dirección:</b> 3 ceros, Matamoros y Guerrero. Col. Obrera No. 349.
@endsection

@section('telefono')
    <b>Teléfono:</b> 834 175 00 86
@endsection

@section('email')
    <b>Correo electrónico:</b> hernando.uri23@gmail.com
@endsection

@section('estudios')
    <b>Estudios:</b>
    <ul>
        <li>Técnico en Programación, en el Centro de Bachillerato Tecnológico, Industrial y de Servicios No. 119. (2017 - 2020).</li>
        <li>Ingeniería en Tecnologías de la Información, en la Universidad Politécnica de Victoria. (2020 - en curso).</li>
    </ul>
@endsection

@section('habilidades')
    Habilidades:
@endsection

@section('habilidadesTexto')
    <ul>
        <li>Manejo de lenguajes de programación como PHP, JavaScript, HTML, CSS entre otros.</li>
        <li>Manejo de herramientas de desarrollo como Visual Studio, SQL Developer entre otros.</li>
        <li>Manejo de Bases de datos SQL como MySQL, Oracle entre otros.</li>
        <li>Manejo de herramientas de oficina como Word, Excel, PowerPoint, entre otros.</li>
    </ul>
@endsection

@section('cursos')
    Cursos:
@endsection

@section('cursosTexto')
    <ul>
        <li>Curso de programación en C.</li>
        <li>Curso de programación en C++.</li>
        <li>Curso de programación en Python.</li>
        <li>Curso de programación en JavaScript.</li>
        <li>Curso de programación en SQL.</li>
        <li>Curso de programación en PL/SQL.</li>
    </ul>
@endsection

@section('acerca')
    Acerca de mi:
@endsection

@section('acercaTexto')
    <ul>
        <li>Me motiva mucho desarrollar mis habilidades y crecer de forma☺ personal y profesional. Espero ser de gran ayuda y aportar en el crecimiento de la empresa.</li>
        <li>Me gusta mucho la programación y el desarrollo de software, me gusta mucho aprender cosas nuevas y me gusta mucho la tecnología.</li>
        <li>Me gusta mucho la música, mi genero favorito es el metal, me gustan los deportes, mi deporte favorito es el americano.</li>
    </ul>
@endsection
