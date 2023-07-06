<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    public function agregar(Request $request){
        $item = Periodo::where('Guid', $request->input('guid'))->get();
        if (count($item) == 0) {

            $item = new Periodo();
            $item->Nombre = $request->input('nombre');
            $item->FechaInicial = $request->input('fechaInicial');
            $item->FechaFinal = $request->input('fechaFinal');
            $item->EstaActivo = 1;            
            $item->Guid = $request->input('guid');
            $item->save();

            $respuesta = array(
                'id' => $item->Id,
                'guid' => $item->Guid
            );
            return response($respuesta, 201);
        } else {
            return response($item[0], 200);
        }
    }
}
