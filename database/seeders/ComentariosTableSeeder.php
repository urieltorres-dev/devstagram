<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comentario::factory(100)->create();
    }
}
