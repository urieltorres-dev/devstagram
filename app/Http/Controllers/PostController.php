<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $posts = DB::table('post')->where('user_id', auth()->user()->id)->get();
        return view('dashboard',['posts' => $posts]);
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

        //Guardar los campos en el modelo Post
        /*Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            //Identificar el usuario autenticado para guardarlo
            'user_id' =>auth()->user()->id
        ]);
        */

        //Guardar la información con relaciones (Modelo ER)
        // "post" es el noombre de la relación
        $request->user()->post()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' =>auth()->user()->id
        ]);

        //Redireccionar al muro principal después de guardar el Post de publicación
        return redirect()->route('post.index');
    }
}
