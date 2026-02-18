<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\Lectura;

class MovilController extends Controller
{
    public function entrada(Request $request)
    {
        $info = array();
        $info["datos"] = array();

        $autentificacion = $request->auth;
        $serial = $rerquest->serial;

        if($autentificacion == 1)
        {

        }
        else
        {
            $info = array(
                'respuesta' => 'Entrada error',
            );
        }

        echo json_encode($info);
    }

    public function salida(Request $request)
    {
        $autentificacion = $request->auth;
        $serial = $rerquest->serial;


    }
}
