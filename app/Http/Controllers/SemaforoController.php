<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semaforo;
use App\Events\MessageSent;

class SemaforoController extends Controller
{
    public function entradas_semaforo($v)
    {
        // para probar multifactor1.com/api/s/v=0007FAF9,0,0,0,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0

        $cadena = str_replace ( 'v=', '', $v);

        $partes = explode(",", $cadena);
        
        $chorizo = $cadena;
        
        if(isset($partes[0]))
        {
            $var0 = $partes[0];
        } 
        else
        {
            $var0 = "";
        }

        if(isset($partes[4]))
        {
            $var4 = $partes[4];
        } 
        else
        {
            $var4 = "";
        }
        
        if(isset($partes[5]))
        {
            $var5 = $partes[5];
        } 
        else
        {
            $var5 = "";
        }
        
        if(isset($partes[6]))
        {
            $var6 = $partes[6];
        } 
        else
        {
            $var6 = "";
        }
        
        if(isset($partes[7]))
        {
            $var7 = $partes[7];
        } 
        else
        {
            $var7 = "";
        }
        
        if(isset($partes[8]))
        {
            $var8 = $partes[8];
        } 
        else
        {
            $var8 = "";
        }
        
        if(isset($partes[9]))
        {
            $var9 = $partes[9];
        } 
        else
        {
            $var9 = "";
        }
        
        if(isset($partes[10]))
        {
            $var10 = $partes[10];
        } 
        else
        {
            $var10 = "";
        }
        
        if(isset($partes[11]))
        {
            $var11 = $partes[11];
        } 
        else
        {
            $var11 = "";
        }
        
        if(isset($partes[31]))
        {
            $var31 = $partes[31];
        } 
        else
        {
            $var31 = "";
        }

        $actualizar = Semaforo::where('id_maquina', $var0)->update([
            'estatus_device'=>$var31,
            'luz1'=>$var4,
            'luz2'=>$var5,
            'luz3'=>$var6,
            'luz4'=>$var7,
            'luz5'=>$var8,
            'luz6'=>$var9,
            'luz7'=>$var10,
            'luz8'=>$var11,
            'chorizo'=>$chorizo,
        ]);

        $solicitar = Semaforo::where('id_maquina', $var0)->where('solicitud', '<>', 0)->count();
        if($solicitar > 0)
        {
            $solicitar = Semaforo::where('id_maquina', $var0)->where('solicitud', '<>', 0)->first();

            $dato = array(
                'a' => '1',
                'b' => '5',
                'c' => '1',
                'd' => $solicitar->valor,
                'e' => '0',
                'f' => '0',
                'g' => '0',
                'h' => '0',
                'i' => '0',
            );

            $actualizar = Semaforo::where('id_maquina', $var0)->update([
                'solicitud' => 0,
                'valor' => '',
            ]);
        }
        else
        {
            $dato = array(
                'a' => '0',
                'b' => '0',
                'c' => '0',
                'd' => '0',
                'e' => '0',
                'f' => '0',
                'g' => '0',
                'h' => '0',
                'i' => '0',
            );
        }
        
        echo json_encode($dato);

        /*DISPARANDO EL REVERB*/
        MessageSent::dispatch();
    }
}
