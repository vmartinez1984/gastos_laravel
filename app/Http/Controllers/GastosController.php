<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Periodo;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Mockery\Undefined;

class GastosController extends Controller
{
    public function agregar(Request $request)
    {
        $item = Gasto::where('Guid', $request->input('guid'))->get();
        if (count($item) == 0) {

            $item = new Gasto();
            $item->SubcategoriaId = $this->obtenerSubcategoriaId($request->input('subcategoriaGuidId'));
            $item->Nombre = $request->input('nombre');
            $item->Cantidad = $request->input('cantidad');
            $item->PeriodoId = $this->obtenerPeriodoId($request->input('periodoGuidId'));
            $item->EstaActivo = 1;
            $item->Guid = $request->input('guid');
            // if ( isset($request->input('fechaDeRegistro')))
            //     $item->FechaDeRegistro = $request->input('fechaDeRegistro');
            // else
                $item->FechaDeRegistro = date("Y-m-d H:i:s");
            $item->save();
            //print_r($item);
            $respuesta = array(
                'id' => $item->Id,
                'guid' => $item->Guid
            );
            return response($respuesta, 201);
        } else {
            return response($item[0], 200);
        }
    }

    private function obtenerSubcategoriaId($guidId)
    {
        $subcategorias = Subcategoria::where('Guid', $guidId)->orWhere('Id', $guidId)->get();
        //print_r($subcategorias[0]);
        return $subcategorias[0]->Id;
    }

    private function obtenerPeriodoId($guidId)
    {
        $periodo = Periodo::where('Guid', $guidId)->orWhere('Id', $guidId)->get();
        //print_r($periodo[0]);
        return $periodo[0]->Id;
    }
}
