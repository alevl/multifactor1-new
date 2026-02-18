<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaquinasSalida;

class DatosSalidasController extends Controller
{
    public function salidas(Request $request)
    {
        $existe = MaquinasSalida::where('propietario_id', $request->id_usuario)->count();
        if($existe > 0 )
        {
            $salidas = MaquinasSalida::where('propietario_id', $request->id_usuario)->get();
            return response()->json($salidas);
        }
        else
        {
            $datos = array(
            'respuesta' => 'no hay datos',
            );
            echo json_encode($datos);
        }
    }
}
