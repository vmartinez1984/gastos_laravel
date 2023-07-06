<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriasController extends Controller
{
    //

    public function obtener_todos()
    {
        $lista = null;

        $lista = Subcategoria::where('EstaActivo', 1)->get();        
        $categorias = Categoria::all();
        foreach ($lista as $key => $value) {
            $value['Cantidad'] = floatval($value['Cantidad']);
            $categoria =null;
            foreach ($categorias as $key => $item) {
                if($value['CategoriaId'] == $item['Id']){
                    $categoria = array(
                        'id' => $item['Id'],
                        'nombre' => $item['Nombre']
                    );
                }
            }
            $value['categoria'] = $categoria;
            unset($value['CategoriaId']);            
        }

        return $lista;
    }

    public function agregar(Request $request)
    {
        $subcategoriaOrigen = Subcategoria::where('Guid', $request->input('guid'))->get();
        if (count($subcategoriaOrigen) == 0) {

            $subcategoria = new Subcategoria();
            $subcategoria->CategoriaId = $request->input('categoriaId');
            $subcategoria->Nombre = $request->input('nombre');
            $subcategoria->EstaActivo = 1;
            $subcategoria->Cantidad = $request->input('cantidad');
            $subcategoria->Guid = $request->input('guid');
            $subcategoria->save();

            $respuesta = array(
                'id' => $subcategoria->Id,
                'guid' => $subcategoria->Guid
            );
            return response($respuesta, 201);
        } else {
            return response($subcategoriaOrigen[0], 200);
        }
    }

    public function obtener($guidId)
    {
        $subcategorias = null;

        $subcategorias = Subcategoria::where('Guid', $guidId)->orWhere('Id', $guidId)->get();
        if (count($subcategorias) == 0)
            return response(array('mensaje' => 'No encontrado'), 404);
        else
            return response($subcategorias[0], 200);
    }
}
