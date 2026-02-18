<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;

class DatosController extends Controller
{
    public function dispositivos(Request $request)
    {
        $existe = Maquina::where('propietario_id', $request->id_usuario)->count();
        if($existe > 0 )
        {
            $maquinas = Maquina::where('propietario_id', $request->id_usuario)->get();
            return response()->json($maquinas);
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
