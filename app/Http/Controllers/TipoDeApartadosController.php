<?php

namespace App\Http\Controllers;

use App\Models\TipoDeApartado;
use Illuminate\Http\Request;

class TipoDeApartadosController extends Controller
{
    public function obtener_todos(){
        $lista = null;

        $lista = TipoDeApartado::where('EstaActivo',1)->get();

        return response($lista, 200);
    }

    public function agregar(Request $request){
        $item = new TipoDeApartado();
        $item->Nombre = $request->input('nombre');
        $item->EstaActivo = 1;
        $item->save();

        return response(array('id' => $item->Id),201);
    }
}
