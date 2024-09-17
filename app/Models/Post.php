<?php

namespace App\Models;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    //Forzar el nombre de la tabla Post en singular
    //protected $table = 'post';

    //Protegemos la información para guardarla en la BD
    protected $fillable=[
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //Creamos la relación de un Post pertenece a un User(relación inversa)
    public function user()
    {
        return $this->belongsTo(User::class)->selected(['name', 'username']);
    }

    //Creamos la relacion Post Comentario
    public function comentarios()
    {
        //Un post tiene muchos comentarios
        return $this->hasMany(Comentario::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
