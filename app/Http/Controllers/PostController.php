<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //Constructor de la sesion
    public function __construct()
    {
        //Proteger el constructor con autenticacion, es decir antes de ejecutar el metodo index debemos pasar el parametro de autenticacion
        $this->middleware('auth');
    }

    //Para mostrar el muro de perfil
    public function index(){
        //dd('Estamos en el muro del usuario');
        //Aplicamos un helper para revisar que el usuario esta autenticado
        //dd(auth()->user());
        //Retornamos a la vista "dashboard"
        return view('dashboard');
    }

    //Crear metodo create para mostrar el formulario d publicacion
    public function create(){
        //dd('Creando post');
        return view('posts.create');
    }

    //Método para guardar imágenes
    public function store(Request $request) {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
    }
}
