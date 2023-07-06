<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function obtener_todos(){
        $lista = null;

        $lista = Categoria::all();

        return $lista;
    }
}
