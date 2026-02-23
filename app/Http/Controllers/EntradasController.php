<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Models\MaquinasSalida;
use App\Models\Lectura;
use App\Events\MessageSent;

class EntradasController extends Controller
{
    //multifactor1-new.test/api/r/v=87B4B300,7,7,0,17,0,17,0,21,0,59,59,16,255,69,19,1,0,2,97,3,55,0,0,0,0,0,0,0,0,34,0
    //multifactor1.com/api/r/v=009D6FC1,7,7,0,17,0,17,0,21,0,59,59,16,255,69,19,1,0,2,97,3,55,0,0,0,0,0,0,0,0,34,0
    // para probar http://multifactor1-new.test/api/r/v=87B4B300,0,0,0,0,0,0,0,0,0,0,0,0,0,69,19,1,0,2,97,3,55,0,0,0,0,0,0,0,0,34,0
    // para probar reverb multifactor1-new.test/api/r/v=00000000,0,0,0,0,0,0,0,0,0,0,0,0,0,69,19,1,0,2,97,3,55,0,0,0,0,0,0,0,0,34,0
    //para probar las maquinas nuevas multifactor1-new.test/api/r/v=0007FEE6,4,133,00,48,18,06,32,16,53,96,128,69,00,153,16,129,69,129,16,32,04,00,04,80,48,24 ,00,32,00,255
    //para probar las maquinas nuevas modelo 4 multifactor1-new.test/api/r/v=00D85FCF,200,-1.5,0.8

    public function entradas($v)
    {
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
        
        $propietario = Maquina::where('id_maquina', $var0)->first();
        $usuario_id = $propietario->usuario_id;

        if($propietario->propietario_id == 1) /*SAFER MODELO 1*/
        {
            /*LECTURA DEL CHORIZO PARA MAQUINAS SAFER*/

            if(isset($partes[1]))
            {
                $var1 = $partes[1];
            } 
            else
            {
                $var1 = "";
            }
            
            if(isset($partes[2]))
            {
                $var2 = dechex($partes[2]);
                $cant2 = strlen($var2);
                if($cant2 < 2)
                {
                    if($var2 == 0)
                    {
                        $var2 = "00";
                    }
                    else
                    {
                        $var2 = "0".$var2;
                    }
                }
            } 
            else
            {
                $var2 = "";
            }
            if(isset($partes[3]))
            {
                $var3 = dechex($partes[3]);
                $cant3 = strlen($var3);
                if($cant3 < 2)
                {
                    if($var3 == 0)
                    {
                        $var3 = "00";
                    }
                    else
                    {
                        $var3 = "0".$var3;
                    }
                }
            } 
            else
            {
                $var3 = "";
            }
            if(isset($partes[4]))
            {
                $var4 = dechex($partes[4]);
                $cant4 = strlen($var4);
                if($cant4 < 2)
                {
                    if($var4 == 0)
                    {
                        $var4 = "00";
                    }
                    else
                    {
                        $var4 = "0".$var4;
                    }
                }
            } 
            else
            {
                $var4 = "";
            }
            if(isset($partes[5]))
            {
                $var5 = dechex($partes[5]);
                $cant5 = strlen($var5);
                if($cant5 < 2)
                {
                    if($var5 == 0)
                    {
                        $var5 = "00";
                    }
                    else
                    {
                        $var5 = "0".$var5;
                    }
                }
            } 
            else
            {
                $var5 = "";
            }
            
            if(isset($partes[6]))
            {
                $var6 = dechex($partes[6]);
                $cant6 = strlen($var6);
                if($cant6 < 2)
                {
                    if($var6 == 0)
                    {
                        $var6 = "00";
                    }
                    else
                    {
                        $var6 = "0".$var6;
                    }
                }
            } 
            else
            {
                $var6 = "";
            }
            if(isset($partes[7]))
            {
                $var7 = dechex($partes[7]);
                $cant7 = strlen($var7);
                if($cant7 < 2)
                {
                    if($var7 == 0)
                    {
                        $var7 = "00";
                    }
                    else
                    {
                        $var7 = "0".$var7;
                    }
                }
            } 
            else
            {
                $var7 = "";
            }
            
            if(isset($partes[8]))
            {
                $var8 = dechex($partes[8]);
                $cant8 = strlen($var8);
                if($cant8 < 2)
                {
                    if($var8 == 0)
                    {
                        $var8 = "00";
                    }
                    else
                    {
                        $var8 = "0".$var8;
                    }
                }
            } 
            else
            {
                $var8 = "";
            }
            
            if(isset($partes[9]))
            {
                $var9 = dechex($partes[9]);
                $cant9 = strlen($var9);
                if($cant9 < 2)
                {
                    if($var9 == 0)
                    {
                        $var9 = "00";
                    }
                    else
                    {
                        $var9 = "0".$var9;
                    }
                }
            } 
            else
            {
                $var9 = "";
            }
            
            if(isset($partes[10]))
            {
                $var10 = dechex($partes[10]);
                $cant10 = strlen($var10);
                if($cant10 < 2)
                {
                    if($var10 == 0)
                    {
                        $var10 = "00";
                    }
                    else
                    {
                        $var10 = "0".$var10;
                    }
                }
            } 
            else
            {
                $var10 = "";
            }
            
            if(isset($partes[11]))
            {
                $var11 = dechex($partes[11]);
                $cant11 = strlen($var11);
                if($cant11 < 2)
                {
                    if($var11 == 0)
                    {
                        $var11 = "00";
                    }
                    else
                    {
                        $var11 = "0".$var11;
                    }
                }
            } 
            else
            {
                $var11 = "";
            }
            
            if(isset($partes[12]))
            {
                $var12 = dechex($partes[12]);
                $cant12 = strlen($var12);
                if($cant12 < 2)
                {
                    if($var12 == 0)
                    {
                        $var12 = "00";
                    }
                    else
                    {
                        $var12 = "0".$var12;
                    }
                }
            } 
            else
            {
                $var12 = "";
            }
            
            if(isset($partes[13]))
            {
                $var13 = dechex($partes[13]);
                $cant13 = strlen($var13);
                if($cant13 < 2)
                {
                    if($var13 == 0)
                    {
                        $var13 = "00";
                    }
                    else
                    {
                        $var13 = "0".$var13;
                    }
                }
            } 
            else
            {
                $var13 = "";
            }
            
            if(isset($partes[14]))
            {
                $var14 = dechex($partes[14]);
                $cant14 = strlen($var14);
                if($cant14 < 2)
                {
                    if($var14 == 0)
                    {
                        $var14 = "00";
                    }
                    else
                    {
                        $var14 = "0".$var14;
                    }
                }
            } 
            else
            {
                $var14 = "";
            }
            
            if(isset($partes[15]))
            {
                $var15 = dechex($partes[15]);
                $cant15 = strlen($var15);
                if($cant15 < 2)
                {
                    if($var15 == 0)
                    {
                        $var15 = "00";
                    }
                    else
                    {
                        $var15 = "0".$var15;
                    }
                }
            } 
            else
            {
                $var15 = "";
            }
            
            if(isset($partes[16]))
            {
                $var16 = $partes[16];
            } 
            else
            {
                $var16 = "";
            }
            
            if(isset($partes[17]))
            {
                $var17 = $partes[17];
            } 
            else
            {
                $var17 = "";
            }
            
            if(isset($partes[18]))
            {
                $var18 = $partes[18];
            } 
            else
            {
                $var18 = "";
            }
            
            if(isset($partes[19]))
            {
                $var19 = $partes[19];
            } 
            else
            {
                $var19 = "";
            }
            
            if(isset($partes[20]))
            {
                $var20 = $partes[20];
            } 
            else
            {
                $var20 = "";
            }
            
            if(isset($partes[21]))
            {
                $var21 = $partes[21];
            } 
            else
            {
                $var21 = "";
            }
            
            if(isset($partes[22]))
            {
                $var22 = $partes[22];
            } 
            else
            {
                $var22 = "";
            }
            
            if(isset($partes[23]))
            {
                $var23 = $partes[23];
            } 
            else
            {
                $var23 = "";
            }
            
            if(isset($partes[24]))
            {
                $var24 = $partes[24];
            } 
            else
            {
                $var24 = "";
            }
            
            if(isset($partes[25]))
            {
                $var25 = $partes[25];
            } 
            else
            {
                $var25 = "";
            }
            
            if(isset($partes[26]))
            {
                $var26 = $partes[26];
            } 
            else
            {
                $var26 = "";
            }
            
            if(isset($partes[27]))
            {
                $var27 = $partes[27];
            } 
            else
            {
                $var27 = "";
            }
            
            if(isset($partes[28]))
            {
                $var28 = $partes[28];
            } 
            else
            {
                $var28 = "";
            }
            
            if(isset($partes[29]))
            {
                $var29 = $partes[29];
            } 
            else
            {
                $var29 = "";
            }
            
            if(isset($partes[30]))
            {
                $var30 = $partes[30];
            } 
            else
            {
                $var30 = "";
            }
            if(isset($partes[31]))
            {
                $var31 = $partes[31];
            } 
            else
            {
                $var31 = "";
            }
            if(isset($partes[32]))
            {
                $var32 = $partes[32];
            } 
            else
            {
                $var32 = "";
            }

            $whats = array();
            $whats["datos"] = array();
            
            $dato = array(
                'var0' => $var0,
                'var1' => $var1,
                'var2' => $var2,
                'var3' => $var3,
                'var4' => $var4,
                'var5' => $var5,
                'var6' => $var6,
                'var7' => $var7,
                'var8' => $var8,
                'var9' => $var9,
                'var10' => $var10,
                'var11' => $var11,
                'var12' => $var12,
                'var13' => $var13,
                'var14' => $var14,
                'var15' => $var15,
                'var16' => $var16,
                'var17' => $var17,
                'var18' => $var18,
                'var19' => $var19,
                'var20' => $var20,
                'var21' => $var21,
                'var22' => $var22,
                'var23' => $var23,
                'var24' => $var24,
                'var25' => $var25,
                'var26' => $var26,
                'var27' => $var27,
                'var28' => $var28,
                'var29' => $var29,
                'var30' => $var30,
                'var31' => $var31,
                'var32' => $var32,
            );
            //echo json_encode($dato);
            
            date_default_timezone_set('America/Denver');
            $fecha = date('d/m/Y H:i:s');
            
            //ENABLE DE LAS SALIDAS
            $enable1 = $var1 & 1;
            $enable2 = $var1 & 2;
            $enable3 = $var1 & 4;
            
            //CALCULANDO EL ESTATUS DE LAS SALIDAS
            $hab = $var17 & 1;
            $hab2 = $var17 & 2;
            $hab3 = $var17 & 4;
            
            //OUTPUT
            $ton1 = $var2.":".$var3;
            $toff1 = $var4.":".$var5;
            
            $ton2 = $var6.":".$var7;
            $toff2 = $var8.":".$var9;
            
            $ton3 = $var10.":".$var11;
            $toff3 = $var12.":".$var13;
            
            //RELOJ
            $clock = $var15.":".$var14;
            
            //DIA DE LA SEMANA
            $wd = $var16;
            
            //SET POINT
            $point1 = number_format((($var20*256)+$var21)/10,1);
            $point2 = number_format((($var24*256)+$var25)/10,1);
            $point3 = number_format((($var28*256)+$var29)/10,1);
            
            $actualizar = Maquina::where('id_maquina', $var0)
            ->update([
                'reloj' => $clock,
                'dia_id' => $wd,
                'chorizo' => $chorizo,
            ]);
            
            /*BUSCANDO EL ID DE LA MAQUINA*/
            $cod = Maquina::where('id_maquina', $var0)->first();

            $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
            ->where('salida', 1)
            ->update([
                'hora_encendido' => $ton1,
                'hora_apagado' => $toff1,
                'estatus_estado_id' => $hab,
                'estatus_maquina_id' => $enable1,
                'uno' => 1,
                'dos' => $var18,
                'tres' => $var18,
                'cuatro' => $var19,
                'point' => $point1,
            ]);

            $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
            ->where('salida', 2)
            ->update([
                'hora_encendido' => $ton2,
                'hora_apagado' => $toff2,
                'estatus_estado_id' => $hab2,
                'estatus_maquina_id' => $enable2,
                'uno' => 2,
                'dos' => $var22,
                'tres' => $var22,
                'cuatro' => $var23,
                'point' => $point2,
            ]);

            $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
            ->where('salida', 3)
            ->update([
                'hora_encendido' => $ton3,
                'hora_apagado' => $toff3,
                'estatus_estado_id' => $hab3,
                'estatus_maquina_id' => $enable3,
                'uno' => 3,
                'dos' => $var26,
                'tres' => $var26,
                'cuatro' => $var27,
                'point' => $point3,
            ]);
            
            /*BUSCANDO SI EL USUARIO SOLICITO CAMBIO DE HORA Y DIA DE LA MAQUINA*/
            $estatus_device=0;
            $cambio = Maquina::where('id_maquina', $var0)->first();
            
            $time = $cambio->reloj_solicitado;
            $day = $cambio->dia_solicitado;
            $estatus_device = $cambio->estatus_device;

            $partes_output = explode(":", $time);
            if(isset($partes_output[0]))
            {
                $hora_output = $partes_output[0];
            } 
            else
            {
                $hora_output = "";
            }
            
            if(isset($partes_output[1]))
            {
                $minutos_output = $partes_output[1];
            } 
            else
            {
                $minutos_output = "";
            }

            /*BUSCANDO SI EL USUARIO SOLICITO CAMBIO DE TURN ON Y TURN OFF*/
            $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 1)->count();
            if($cambio1 > 0)
            {
                $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 1)->first();
                $turn_on = $cambio1->turnon_solicitado;
                $turn_off = $cambio1->turnoff_solicitado;
                $estatus_output = $cambio1->estatus_turn;
                $salida_machine = '1';
                $salida_turn = '40';
            }
            else
            {
                $cambio2 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 2)->count();
                if($cambio2> 0)
                {
                    $cambio2 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 2)->first();
                    $turn_on = $cambio2->turnon_solicitado;
                    $turn_off = $cambio2->turnoff_solicitado;
                    $estatus_output = $cambio2->estatus_turn;
                    $salida_machine = '2';
                    $salida_turn = '41';    
                }
                else
                {
                    $cambio3 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 3)->count();
                    if($cambio3 > 0)
                    {
                        $cambio3 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_turn', 1)->where('salida', 3)->first();
                        $turn_on = $cambio3->turnon_solicitado;
                        $turn_off = $cambio3->turnoff_solicitado;
                        $estatus_output = $cambio3->estatus_turn;
                        $salida_machine = '3';
                        $salida_turn = '42';        
                    }
                    else
                    {
                        $turn_on = "00:00";
                        $turn_off = "00:00";
                        $estatus_output = '0';
                        $salida_machine = '255';
                        $hora_on = "";
                        $hora_off = "";
                        $minutos_off = "";
                        $minutos_on = "";                        
                    }                            
                }
            }

            $partes_on = explode(":", $turn_on);
            if(isset($partes_on[0]))
            {
                $hora_on = $partes_on[0];
            } 
            else
            {
                $hora_on = "";
            }
            if(isset($partes_on[1]))
            {
                $minutos_on = $partes_on[1];
            } 
            else
            {
                $minutos_on = "";
            }
            
            $partes_off = explode(":", $turn_off);
            if(isset($partes_off[0]))
            {
                $hora_off = $partes_off[0];
            } 
            else
            {
                $hora_off = "";
            }
            if(isset($partes_off[1]))
            {
                $minutos_off = $partes_off[1];
            } 
            else
            {
                $minutos_off = "";
            }

            /*BUSCANDO SI EL USUARIO SOLICITO CAMBIO EN EL SETPOINT*/
            $estatus_point = 0;
            $salida_point = 0;
            
            $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 1)->count();
            if($cambio1 > 0)
            {
                $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 1)->first();
                $point = $cambio1->setpoint_solicitado;
                $estatus_point = $cambio1->estatus_point;
                $salida_point = '1';
            }
            else
            {
                $cambio2 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 2)->count();
                if($cambio2> 0)
                {
                    $cambio2 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 2)->first();
                    $point = $cambio2->setpoint_solicitado;
                    $estatus_point = $cambio2->estatus_point;
                    $salida_point = '2';
                }
                else
                {
                    $cambio3 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 3)->count();
                    if($cambio3 > 0)
                    {
                        $cambio3 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 3)->first();
                        $point = $cambio3->setpoint_solicitado;
                        $estatus_point = $cambio3->estatus_point;
                        $salida_point = '3';
                        }
                    else
                    {
                        $point = "";
                    }                            
                }
            }
            
            $caracteres = strlen($point);
            if($caracteres == 4)
            {
                $datoh = substr($point, 0, -2);
                $datol = substr($point, 2, 2);
            }
            else
            {
                if($caracteres == 3)
                {
                    $datoh = "0".substr($point, 0, -2);
                    $datol = substr($point, 1, 2);
                }
                else
                {
                    if($caracteres == 2)
                    {
                        $datoh = "00";
                        $datol = $point;
                    }
                    else
                    {
                        if($caracteres == 1)
                        {
                            $datoh = "00";
                            $datol = "0".$point;
                        }
                        else
                        {
                            $datoh = "00";
                            $datol = "00";
                        }
                    }
                }
            }
            
            if($estatus_device == 1)
            {
                $dato = array(
                    'a' => '1',
                    'b' => '8',
                    'c' => '21',
                    'd' => '0',
                    'e' => $minutos_output,
                    'f' => $hora_output,
                    'g' => $day,
                    'h' => '0',
                    'i' => '0',
                );	
            }
            else
            {
                if($estatus_output == 1)
                {
                    $dato = array(
                        'a' => '1',
                        'b' => '27',
                        'c' => $salida_turn,
                        'd' => '1',
                        'e' => $hora_on,
                        'f' => $minutos_on,
                        'g' => $hora_off,
                        'h' => $minutos_off,
                        'i' => '0',
                    );
                }
                else
                {
                    if($estatus_point > 0 and $estatus_point < 4)
                    {
                        $dato = array(
                            'a' => '1',
                            'b' => '8',
                            'c' => '11',
                            'd' => $salida_point,
                            'e' => '1',
                            'f' => $datoh,
                            'g' => $datol,
                            'h' => '0',
                            'i' => '0',
                        );
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
                }
            }
            echo json_encode($dato);
            json_encode($dato);

            $actualizar = Maquina::where('id_maquina', $var0)
            ->update([
                'estatus_device' => 0,
            ]);

            if($salida_machine == 1)
            {
                $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                ->where('salida', 1)
                ->update([
                    'estatus_turn' => 0,
                ]);
            }
            else
            {
                if($salida_machine == 2)
                {
                    $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                    ->where('salida', 2)
                    ->update([
                        'estatus_turn' => 0,
                    ]);
                }
                else
                {
                    if($salida_machine == 3)
                    {
                        $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                        ->where('salida', 3)
                        ->update([
                            'estatus_turn' => 0,
                        ]);
                    }
                }
            }

            $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
            ->where('salida', $salida_point)
            ->update([
                'estatus_point' => 0,
            ]);

            /*DISPARANDO EL REVERB*/
            MessageSent::dispatch();
        }
        else
        {
            /*LECTURA DEL CHORIZO PARA MAQUINAS DISTINTAS A SAFER*/
            if(isset($partes[1]))
            {
                $var1 = $partes[1];
            } 
            else
            {
                $var1 = "";
            }
            
            if($var1 == 1 or $var1 == 3)
            {
                if(isset($partes[2]))
                {
                    $var2 = $partes[2];
                } 
                else
                {
                    $var2 = "";
                }
                if(isset($partes[3]))
                {
                    $var3 = $partes[3];
                } 
                else
                {
                    $var3 = "";
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
                    $var8 = dechex($partes[8]);
                    $cant8 = strlen($var8);
                    if($cant8 < 2)
                    {
                        if($var8 == 0)
                        {
                            $var8 = "00";
                        }
                        else
                        {
                            $var8 = "0".$var8;
                        }
                    }
                } 
                else
                {
                    $var8 = "";
                }
                
                if(isset($partes[9]))
                {
                    $var9 = dechex($partes[9]);
                    $cant9 = strlen($var9);
                    if($cant9 < 2)
                    {
                        if($var9 == 0)
                        {
                            $var9 = "00";
                        }
                        else
                        {
                            $var9 = "0".$var9;
                        }
                    }
                } 
                else
                {
                    $var9 = "";
                }
                
                if(isset($partes[10]))
                {
                    $var10 = dechex($partes[10]);
                } 
                else
                {
                    $var10 = "";
                }
                
                if(isset($partes[11]))
                {
                    $var11 = dechex($partes[11]);
                } 
                else
                {
                    $var11 = "";
                }
                
                if(isset($partes[12]))
                {
                    $var12 = dechex($partes[12]);
                } 
                else
                {
                    $var12 = "";
                }
                
                if(isset($partes[13]))
                {
                    $var13 = dechex($partes[13]);
                } 
                else
                {
                    $var13 = "";
                }
                
                if(isset($partes[14]))
                {
                    $var14 = dechex($partes[14]);
                    $cant14 = strlen($var14);
                    if($cant14 < 2)
                    {
                        if($var14 == 0)
                        {
                            $var14 = "00";
                        }
                        else
                        {
                            $var14 = "0".$var14;
                        }
                    }
                } 
                else
                {
                    $var14 = "";
                }
                
                if(isset($partes[15]))
                {
                    $var15 = dechex($partes[15]);
                    $cant15 = strlen($var15);
                    if($cant15 < 2)
                    {
                        if($var15 == 0)
                        {
                            $var15 = "00";
                        }
                        else
                        {
                            $var15 = "0".$var15;
                        }
                    }
                } 
                else
                {
                    $var15 = "";
                }
                
                if(isset($partes[16]))
                {
                    $var16 = $partes[16];
                } 
                else
                {
                    $var16 = "";
                }
                
                if(isset($partes[17]))
                {
                    $var17 = $partes[17];
                } 
                else
                {
                    $var17 = "";
                }
                
                if(isset($partes[18]))
                {
                    $var18 = $partes[18];
                } 
                else
                {
                    $var18 = "";
                }
                
                if(isset($partes[19]))
                {
                    $var19 = $partes[19];
                } 
                else
                {
                    $var19 = "";
                }
                
                if(isset($partes[20]))
                {
                    $var20 = $partes[20];
                } 
                else
                {
                    $var20 = "";
                }
                
                if(isset($partes[21]))
                {
                    $var21 = $partes[21];
                } 
                else
                {
                    $var21 = "";
                }
                
                if(isset($partes[22]))
                {
                    $var22 = $partes[22];
                } 
                else
                {
                    $var22 = "";
                }
                
                if(isset($partes[23]))
                {
                    $var23 = $partes[23];
                } 
                else
                {
                    $var23 = "";
                }
                
                if(isset($partes[24]))
                {
                    $var24 = $partes[24];
                } 
                else
                {
                    $var24 = "";
                }
                
                if(isset($partes[25]))
                {
                    $var25 = $partes[25];
                } 
                else
                {
                    $var25 = "";
                }
                
                if(isset($partes[26]))
                {
                    $var26 = $partes[26];
                } 
                else
                {
                    $var26 = "";
                }
                
                if(isset($partes[27]))
                {
                    $var27 = $partes[27];
                } 
                else
                {
                    $var27 = "";
                }
                
                if(isset($partes[28]))
                {
                    $var28 = $partes[28];
                } 
                else
                {
                    $var28 = "";
                }
                
                if(isset($partes[29]))
                {
                    $var29 = $partes[29];
                } 
                else
                {
                    $var29 = "";
                }
                
                if(isset($partes[30]))
                {
                    $var30 = $partes[30];
                } 
                else
                {
                    $var30 = "";
                }
                if(isset($partes[31]))
                {
                    $var31 = $partes[31];
                } 
                else
                {
                    $var31 = "";
                }
                if(isset($partes[32]))
                {
                    $var32 = $partes[32];
                } 
                else
                {
                    $var32 = "";
                }
                
                $whats = array();
                $whats["datos"] = array();
            
                $dato = array(
                    'var0' => $var0,
                    'var1' => $var1,
                    'var2' => $var2,
                    'var3' => $var3,
                    'var4' => $var4,
                    'var5' => $var5,
                    'var6' => $var6,
                    'var7' => $var7,
                    'var8' => $var8,
                    'var9' => $var9,
                    'var10' => $var10,
                    'var11' => $var11,
                    'var12' => $var12,
                    'var13' => $var13,
                    'var14' => $var14,
                    'var15' => $var15,
                    'var16' => $var16,
                    'var17' => $var17,
                    'var18' => $var18,
                    'var19' => $var19,
                    'var20' => $var20,
                    'var21' => $var21,
                    'var22' => $var22,
                    'var23' => $var23,
                    'var24' => $var24,
                    'var25' => $var25,
                    'var26' => $var26,
                    'var27' => $var27,
                    'var28' => $var28,
                    'var29' => $var29,
                    'var30' => $var30,
                    'var31' => $var31,
                    'var32' => $var32,
                );
                //echo json_encode($dato);
                date_default_timezone_set('America/Denver');
                $fecha = date('d/m/Y H:i:s');
                $fecha_actual = date('d/m/Y');
                $hora_actual = date('H:i:s');
                $fecha_invertida = date('Y').date('m').date('d');
            
                //ENABLE DE LAS SALIDAS
                $enable1 = $var1 & 1;
                $enable2 = $var1 & 2;
                $enable3 = $var1 & 4;
            
                //CALCULANDO EL ESTATUS DE LAS SALIDAS
                $hab = $var17 & 1;
                $hab2 = $var17 & 2;
                $hab3 = $var17 & 4;
            
                //OUTPUT
                $ton1 = $var2.":".$var3;
                $toff1 = $var4.":".$var5;
            
                $ton2 = $var6.":".$var7;
                $toff2 = $var8.":".$var9;
            
                $ton3 = $var10.":".$var11;
                $toff3 = $var12.":".$var13;
            
                //RELOJ
                $clock = $var15.":".$var14;
            
                //DIA DE LA SEMANA
                $wd = $var16;
            
                //DESHIELO
            
                if($hab2 == 0)
                {
                    $hora_deshielo = hexdec($var12);
                    $cant12 = strlen($hora_deshielo);
                    if($cant12 < 2)
                    {
                        if($hora_deshielo == 0)
                        {
                            $hora_deshielo = "00";
                        }
                        else
                        {
                            $hora_deshielo = "0".$hora_deshielo;
                        }
                    }
            
                    $minutos_deshielo = hexdec($var11);
                    $cant11 = strlen($minutos_deshielo);
                    if($cant11 < 2)
                    {
                        if($minutos_deshielo == 0)
                        {
                            $minutos_deshielo = "00";
                        }
                        else
                        {
                            $minutos_deshielo = "0".$minutos_deshielo;
                        }
                    }
            
                    $segundos_deshielo = hexdec($var10);
                    $cant10 = strlen($segundos_deshielo);
                    if($cant10 < 2)
                    {
                        if($segundos_deshielo == 0)
                        {
                            $segundos_deshielo = "00";
                        }
                        else
                        {
                            $segundos_deshielo = "0".$segundos_deshielo;
                        }
                    }
            
                    $deshielo = $hora_deshielo.":".$minutos_deshielo.":".$segundos_deshielo;
            
                }
                else
                {
                    $minutos_duracion = hexdec($var13);
                    $cant13 = strlen($minutos_duracion);
                    if($cant13 < 2)
                    {
                        if($minutos_duracion == 0)
                        {
                            $minutos_duracion = "00";
                        }
                        else
                        {
                            $minutos_duracion = "0".$minutos_duracion;
                        }
                    }
            
                    $segundos_deshielo = hexdec($var10);
                    $cant10 = strlen($segundos_deshielo);
                    if($cant10 < 2)
                    {
                        if($segundos_deshielo == 0)
                        {
                            $segundos_deshielo = "00";
                        }
                        else
                        {
                            $segundos_deshielo = "0".$segundos_deshielo;
                        }
                    }
            
                    $deshielo = $minutos_duracion.":".$segundos_deshielo;
                }
        
                $sp1 = floor($var2/16);
                $spe1 = fmod($var2, 16);
                $spee1 = floor($var3/16);
                $spd1 = fmod($var3, 16);
            
                if($sp1 == 8)
                {
                    $signo1 = "-";
                }
                else
                {
                    $signo1 = "";    
                }
            
                $sp2 = floor($var4/16);
                $spe2 = fmod($var4, 16);
                $spee2 = floor($var5/16);
                $spd2 = fmod($var5, 16);
            
                if($sp2 == 8)
                {
                    $signo2 = "-";
                }
                else
                {
                    $signo2 = "";    
                }
            
                $point1 = $signo1.$spe1.$spee1.".".$spd1;
                $point2 = $signo2.$spe2.$spee2.".".$spd2;
            
                $temperatura_signo = floor($var18/16);
                $temperatura_digito1 = fmod($var18, 16);
                $temperatura_digito2 = floor($var19/16);
                $temperatura_decimal = fmod($var19, 16);
            
                $humedad_digito1 = fmod($var20, 16);
                $humedad_digito2 = floor($var21/16);
                $humedad_decimal = fmod($var21, 16);
            
                if($temperatura_signo == 8)
                {
                    $signo = "-";
                }
                else
                {
                    $signo = "";    
                }
            
                $temp = $signo.$temperatura_digito1.$temperatura_digito2.".".$temperatura_decimal;
                $hum = $humedad_digito1.$humedad_digito2.".".$humedad_decimal;

                $actualizar = Maquina::where('id_maquina', $var0)
                ->update([
                    'reloj' => $clock,
                    'dia_id' => $wd,
                    'deshielo' => $deshielo,
                    'estatus_estado_id' => $var22,
                    'temperatura' => $temp,
                    'humedad' => $hum,
                    'chorizo' => $chorizo,
                ]);

                $lectura = Lectura::create([
                    'maquina' => $var0,
                    'usuario_id' => $usuario_id,
                    'temperatura' => $temp,
                    'humedad' => $hum,
                    'fecha' => $fecha_actual,
                    'hora' => $hora_actual,
                    'fecha_invertida' => $fecha_invertida,
                ]);

                $registros = $lectura->count();
                if($registros > 90000)
                {
                    $borrar = Lectura::where('maquina', $var0)->orderBy('id', 'asc')->take(500)->delete();
                }

                $lectura_baja = $propietario->lectura_minima;
                $lectura_alta = $propietario->lectura_maxima;
                $email1 = $propietario->email1;
                $email2 = $propietario->email2;
                $email3 = $propietario->email3;
                $estatus_maquina_dispositivo = $propietario->estatus_id;
    
                if(($temp < $lectura_baja) or ($temp > $lectura_alta))
                {
                    /*ENVIANDO CORREOS DE ALERTA*/
                    if($email1 <> '' and $estatus_maquina_dispositivo == 1)
                    {
                        $destinatario = $email1;
                        $asunto="Alerta, dispositivo ".$var0;
                        $mensaje= '
                            <html>
                                <head>
                                    <body>
                                        <div style="width:100%; margin-top: -8px; text-align:center;">
                                            <img src="https://www.multifactor1.com/panel/imagenes/logo.png" width="100%"/>	
                                        </div>

                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <div style="width: 100%; font-size: 2em; font-family: tahoma; text-align: center; color: #0981FF; font-weight: bolder;"><p>TEMPERATURA FUERA DE RANGO</p></div>

                                            <p style="color:#595959">La temperatura registrada se sale de la banda de confort, por favor preste atención</p>

                                            <p style="color:#595959">Equipo de Mecaelect</p>
                                        </div>
                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <p style="color:#595959">
                                                

                                            </p>
                                        </div>
                                    </body>
                                </head>			
                            </html>		
                        ';   
                        $cabecera="MIME-Version: 1.0\r\n";
                        $cabecera.="content-type: text/html; charset=iso-8859-1\r\n";
                        $cabecera.= "FROM: Mecaelect <contacto@mecaelect.com>";
                        mail($destinatario, $asunto, $mensaje, $cabecera);	
                        /*FIN DE ENVIAR CORREOS DE ALERTA*/
                    }
                    if($email2 <> '' and $estatus_maquina_dispositivo == 1)
                    {
                        $destinatario = $email2;
                        $asunto="Alerta, dispositivo ".$var0;
                        $mensaje= '
                            <html>
                                <head>
                                    <body>
                                        <div style="width:100%; margin-top: -8px; text-align:center;">
                                            <img src="https://www.multifactor1.com/panel/imagenes/logo.png" width="100%"/>	
                                        </div>

                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <div style="width: 100%; font-size: 2em; font-family: tahoma; text-align: center; color: #0981FF; font-weight: bolder;"><p>TEMPERATURA FUERA DE RANGO</p></div>

                                            <p style="color:#595959">La temperatura registrada se sale de la banda de confort, por favor preste atención</p>

                                            <p style="color:#595959">Equipo de Mecaelect</p>
                                        </div>
                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <p style="color:#595959">
                                                

                                            </p>
                                        </div>
                                    </body>
                                </head>			
                            </html>		
                        ';   
                        $cabecera="MIME-Version: 1.0\r\n";
                        $cabecera.="content-type: text/html; charset=iso-8859-1\r\n";
                        $cabecera.= "FROM: Mecaelect <contacto@mecaelect.com>";
                        mail($destinatario, $asunto, $mensaje, $cabecera);	
                        /*FIN DE ENVIAR CORREOS DE ALERTA*/
                    }
                    if($email3 <> '' and $estatus_maquina_dispositivo == 1)
                    {
                        $destinatario = $email3;
                        $asunto="Alerta, dispositivo ".$var0;
                        $mensaje= '
                            <html>
                                <head>
                                    <body>
                                        <div style="width:100%; margin-top: -8px; text-align:center;">
                                            <img src="https://www.multifactor1.com/panel/imagenes/logo.png" width="100%"/>	
                                        </div>

                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <div style="width: 100%; font-size: 2em; font-family: tahoma; text-align: center; color: #0981FF; font-weight: bolder;"><p>TEMPERATURA FUERA DE RANGO</p></div>

                                            <p style="color:#595959">La temperatura registrada se sale de la banda de confort, por favor preste atención</p>

                                            <p style="color:#595959">Equipo de Mecaelect</p>
                                        </div>
                                        <div style="float: left; width: 96%; margin-top: 25px; padding-right: 2%; padding-left: 2%;">
                                            <p style="color:#595959">
                                                

                                            </p>
                                        </div>
                                    </body>
                                </head>			
                            </html>		
                        ';   
                        $cabecera="MIME-Version: 1.0\r\n";
                        $cabecera.="content-type: text/html; charset=iso-8859-1\r\n";
                        $cabecera.= "FROM: Mecaelect <contacto@mecaelect.com>";
                        mail($destinatario, $asunto, $mensaje, $cabecera);	
                        /*FIN DE ENVIAR CORREOS DE ALERTA*/
                    }
                }

                /*BUSCANDO EL ID DE LA MAQUINA*/
                $cod = Maquina::where('id_maquina', $var0)->first();

                $encendido_permanente = $cod->encendido_permanente;
                $estado_actual = $cod->estatus_estado_id;

                $cod_salida3 = MaquinasSalida::where('id_maquina', $var0)->where('salida', 3)->first();
                $estado_actual_salida3 = $cod_salida3->estatus_estado_id;

                $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                ->where('salida', 1)
                ->update([
                    'estatus_maquina_id' => $enable1,
                    'estatus_estado_id' => $hab,
                    'hora_encendido' => $ton1,
                    'hora_apagado' => $toff1,
                    'point1' => $point1,
                    'point2' => $point2,
                ]);

                $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                ->where('salida', 2)
                ->update([
                    'estatus_maquina_id' => $enable2,
                    'estatus_estado_id' => $hab2,
                    'hora_encendido' => $ton2,
                    'hora_apagado' => $toff2,
                ]);

                $actualizar = MaquinasSalida::where('maquina_id', $cod->id)
                ->where('salida', 3)
                ->update([
                    'estatus_maquina_id' => $enable3,
                    'estatus_estado_id' => $hab3,
                    'hora_encendido' => $ton3,
                    'hora_apagado' => $toff3,
                ]);

                /*BUSCANDO SI EL USUARIO SOLICITO CAMBIO DE HORA Y DIA DE LA MAQUINA*/
                $estatus_device=0;
                $cambio = Maquina::where('id_maquina', $var0)->first();
                
                $time = $cambio->reloj_solicitado;
                $day = $cambio->dia_solicitado;
                $estatus_device = $cambio->estatus_device;

                $partes_output = explode(":", $time);
                if(isset($partes_output[0]))
                {
                    $hora_output = $partes_output[0];
                } 
                else
                {
                    $hora_output = "";
                }
                
                if(isset($partes_output[1]))
                {
                    $minutos_output = $partes_output[1];
                } 
                else
                {
                    $minutos_output = "";
                }

                $informacion1 = MaquinasSalida::where('maquina_id', $cod->id)->where('salida', 2)->first();
                $id_estatus_salida2 = $informacion1->id;
                $salida_turn2 = '41';
                $estatus_frecuencia = $informacion1->estatus_frecuencia;
                $frecuencia_solicitado = $informacion1->frecuencia_solicitado;
                $duracion_solicitado = $informacion1->duracion_solicitado;

                $informacion2 = MaquinasSalida::where('maquina_id', $cod->id)->where('salida', 3)->first();
                $id_estatus_salida3 = $informacion2->id;
                $salida_turn3 = '42';
                $estatus_estatus_valor = $informacion2->estatus_salida_manual;

                $estatus_point = 0;
                $salida_point = 0;
                $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 1)->count();
                if($cambio1 > 0)
                {
                    $cambio1 = MaquinasSalida::where('maquina_id', $cod->id)->where('estatus_point', 1)->where('salida', 1)->first();
                
                    $point1_entero = $cambio1->set_point1_entero;
                    $point1_decimal = $cambio1->set_point1_decimal;
                    $point2_entero = $cambio1->set_point2_entero;
                    $point2_decimal = $cambio1->set_point2_decimal;
                    $estatus_point = $cambio1->estatus_point;
                    $salida_point = '1';
                }
                else
                {
                    $estatus_point = 0;
                }

                $cambio2 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste', 1)->count();
                if($cambio2 > 0)
                {
                    $cambio2 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste', 1)->first();
                
                    $signo_ajuste = $cambio2->signo_ajuste;
                    $entero_ajuste = $cambio2->entero_ajuste;
                    $punto_ajuste = $cambio2->punto_ajuste;
                    $decimal_ajuste = $cambio2->decimal_ajuste;
                    $letra_ajuste = dechex('84'); //letra T
                    $estatus_ajuste = 1;
                }
                else
                {
                    $estatus_ajuste = 0;
                }

                $cambio3 = Maquina::where('id_maquina', $var0)->where('estatus_sistema', 1)->count();
                if($cambio3 > 0)
                {
                    $estatus_sistema = 1;
                }
                else
                {
                    $estatus_sistema = 0;
                }
        
                if($estatus_device == 1)
                {
                    $dato = array(
                        'a' => '1',
                        'b' => '8',
                        'c' => '21',
                        'd' => '0',
                        'e' => $minutos_output,
                        'f' => $hora_output,
                        'g' => $day,
                        'h' => '0',
                        'i' => '0',
                    );

                    $actualizar = Maquina::where('id_maquina', $var0)->update([
                        'estatus_device' => 0,
                    ]);
                }
                else
                {
                    if($estatus_frecuencia == 1)
                    {
                        if($frecuencia_solicitado == 0 and $duracion_solicitado == 0)
                        {
                            $dato = array(
                                'a' => '1',
                                'b' => '27',
                                'c' => '41',
                                'd' => '0',
                                'e' => '0',
                                'f' => '0',
                                'g' => '0',
                                'h' => '0',
                                'i' => '0',
                            );
                        }
                        else
                        {
                            $dato = array(
                                'a' => '1',
                                'b' => '27',
                                'c' => '41',
                                'd' => '3',
                                'e' => $frecuencia_solicitado,
                                'f' => $duracion_solicitado,
                                'g' => '0',
                                'h' => '0',
                                'i' => '0',
                            );
                        }
            
                        $actualizar = MaquinasSalida::where('maquina_id', $cod->id)->where('salida', 2)->update([
                            'estatus_frecuencia' => 0,
                        ]);
                    }
                    else
                    {
                        if(($estatus_estatus_valor == 1) or ($encendido_permanente == 1 and $estado_actual_salida3 == 0))
                        {
                            $dato = array(
                            'a' => '1',
                            'b' => '5',
                            'c' => '51',
                            'd' => '4',
                            'e' => '1',
                            'f' => '0',
                            'g' => '0',
                            'h' => '0',
                            'i' => '0',
                            );

                            $actualizar = MaquinasSalida::where('maquina_id', $cod->id)->where('salida', 3)->update([
                                'estatus_salida_manual' => 0,
                            ]);
                        }
                        else
                        {
                            if(($estatus_sistema == 1) or ($encendido_permanente == 1 and $estado_actual == 0))
                            {
                                $dato = array(
                                'a' => '1',
                                'b' => '5',
                                'c' => '60',
                                'd' => '0',
                                'e' => '0',
                                'f' => '0',
                                'g' => '0',
                                'h' => '0',
                                'i' => '0',
                                );
                    
                                $actualizar = Maquina::where('id_maquina', $var0)->update([
                                    'estatus_sistema' => 0,
                                ]);    
                            }
                            else
                            {
                                if($estatus_point > 0 and $estatus_point < 4)
                                {
                                    $dato = array(
                                        'a' => '1',
                                        'b' => '27',
                                        'c' => '40',
                                        'd' => '1',
                                        'e' => $point1_entero,
                                        'f' => $point1_decimal,
                                        'g' => $point2_entero,
                                        'h' => $point2_decimal,
                                        'i' => '0',
                                    );

                                    $actualizar = MaquinasSalida::where('maquina_id', $cod->id)->where('salida', 1)->update([
                                        'estatus_point' => 0,
                                    ]);
                                }
                                else
                                {
                                    if($estatus_ajuste == 1)
                                    {
                                        $dato = array(
                                            'a' => '1',
                                            'b' => '10',
                                            'c' => '11',
                                            'd' => '54',
                                            'e' => $signo_ajuste,
                                            'f' => $entero_ajuste,
                                            'g' => $punto_ajuste,
                                            'h' => $decimal_ajuste,
                                            'i' => '0',
                                        );

                                        $actualizar = Maquina::where('id_maquina', $var0)->update([
                                            'estatus_ajuste' => 0,
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
                                }
                            }
                        }
                    }
                }
                echo json_encode($dato);

                /*DISPARANDO EL REVERB*/
                MessageSent::dispatch();
            }
            else
            {
                if($var1 == 200)
                {
                    if(isset($partes[2]))
                    {
                        $var2 = $partes[2];
                    } 
                    else
                    {
                        $var2 = "";
                    }
                    if(isset($partes[3]))
                    {
                        $var3 = $partes[3];
                    } 
                    else
                    {
                        $var3 = "";
                    }
                    
                    $whats = array();
                    $whats["datos"] = array();
                
                    $dato = array(
                        'var0' => $var0,
                        'var1' => $var1,
                        'var2' => $var2,
                        'var3' => $var3,
                    );

                    //echo json_encode($dato);
                    date_default_timezone_set('America/Denver');
                    $fecha = date('d/m/Y H:i:s');
                    $fecha_actual = date('d/m/Y');
                    $hora_actual = date('H:i:s');
                    $fecha_invertida = date('Y').date('m').date('d');
echo "INGRESA";                
                    $actualizar = Maquina::where('id_maquina', $var0)
                    ->update([
                        'voltaje' => $var2,
                        'factor_voltaje' => $var3,
                        'chorizo' => $chorizo,
                    ]);

                    $lectura = Lectura::create([
                        'maquina' => $var0,
                        'usuario_id' => $usuario_id,
                        'temperatura' => $var2,
                        'humedad' => null,
                        'fecha' => $fecha_actual,
                        'hora' => $hora_actual,
                        'fecha_invertida' => $fecha_invertida,
                    ]);

                    $registros = $lectura->count();
                    if($registros > 90000)
                    {
                        $borrar = Lectura::where('maquina', $var0)->orderBy('id', 'asc')->take(500)->delete();
                    }
                    
                    $cambio = Maquina::where('id_maquina', $var0)->first();

                    if($cambio->estatus_voltaje == 1)
                    {
                        $dato = array(
                            'a' => '1',
                            'b' => '4',
                            'c' => '1',
                            'd' => $cambio->ajuste_voltaje,
                            'e' => '0',
                            'f' => '0',
                            'g' => '0',
                            'h' => '0',
                            'i' => '0',
                        );

                        $actualizar = Maquina::where('id_maquina', $var0)->update([
                            'estatus_voltaje' => 0,
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
                    json_encode($dato);
                }
                else
                {
                    // MAQUINAS NUEVAS MODELO 3

                    if(isset($partes[2]))
                    {
                        $var2 = $partes[2];
                    } 
                    else
                    {
                        $var2 = "";
                    }
                    if(isset($partes[3]))
                    {
                        $var3 = $partes[3];
                    } 
                    else
                    {
                        $var3 = "";
                    }
                    if(isset($partes[4]))
                    {
                        $var4 = dechex($partes[4]);
                        $cant4 = strlen($var4);
                        if($cant4 < 2)
                        {
                            if($var4 == 0)
                            {
                                $var4 = "00";
                            }
                            else
                            {
                                $var4 = "0".$var4;
                            }
                        }
                    } 
                    else
                    {
                        $var4 = "";
                    }                
                    if(isset($partes[5]))
                    {
                        $var5 = dechex($partes[5]);
                        $cant5 = strlen($var5);
                        if($cant5 < 2)
                        {
                            if($var5 == 0)
                            {
                                $var5 = "00";
                            }
                            else
                            {
                                $var5 = "0".$var5;
                            }
                        }
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
                    
                    if(isset($partes[12]))
                    {
                        $var12 = $partes[12];
                    } 
                    else
                    {
                        $var12 = "";
                    }
                    
                    if(isset($partes[13]))
                    {
                        $var13 = $partes[13];
                    } 
                    else
                    {
                        $var13 = "";
                    }
                    
                    if(isset($partes[14]))
                    {
                        $var14 = $partes[14];
                    } 
                    else
                    {
                        $var14 = "";
                    }
                    
                    if(isset($partes[15]))
                    {
                        $var15 = $partes[15];
                    } 
                    else
                    {
                        $var15 = "";
                    }
                    
                    if(isset($partes[16]))
                    {
                        $var16 = $partes[16];
                    } 
                    else
                    {
                        $var16 = "";
                    }
                    
                    if(isset($partes[17]))
                    {
                        $var17 = $partes[17];
                    } 
                    else
                    {
                        $var17 = "";
                    }
                    
                    if(isset($partes[18]))
                    {
                        $var18 = $partes[18];
                    } 
                    else
                    {
                        $var18 = "";
                    }
                    
                    if(isset($partes[19]))
                    {
                        $var19 = $partes[19];
                    } 
                    else
                    {
                        $var19 = "";
                    }
                    
                    if(isset($partes[20]))
                    {
                        $var20 = $partes[20];
                    } 
                    else
                    {
                        $var20 = "";
                    }
                    
                    if(isset($partes[21]))
                    {
                        $var21 = $partes[21];
                    } 
                    else
                    {
                        $var21 = "";
                    }
                    
                    if(isset($partes[22]))
                    {
                        $var22 = $partes[22];
                    } 
                    else
                    {
                        $var22 = "";
                    }
                    
                    if(isset($partes[23]))
                    {
                        $var23 = $partes[23];
                    } 
                    else
                    {
                        $var23 = "";
                    }
                    
                    if(isset($partes[24]))
                    {
                        $var24 = $partes[24];
                    } 
                    else
                    {
                        $var24 = "";
                    }
                    
                    if(isset($partes[25]))
                    {
                        $var25 = $partes[25];
                    } 
                    else
                    {
                        $var25 = "";
                    }
                    
                    if(isset($partes[26]))
                    {
                        $var26 = $partes[26];
                    } 
                    else
                    {
                        $var26 = "";
                    }
                    
                    if(isset($partes[27]))
                    {
                        $var27 = $partes[27];
                    } 
                    else
                    {
                        $var27 = "";
                    }
                    
                    if(isset($partes[28]))
                    {
                        $var28 = $partes[28];
                    } 
                    else
                    {
                        $var28 = "";
                    }
                    
                    if(isset($partes[29]))
                    {
                        $var29 = $partes[29];
                    } 
                    else
                    {
                        $var29 = "";
                    }
                    
                    if(isset($partes[30]))
                    {
                        $var30 = $partes[30];
                    } 
                    else
                    {
                        $var30 = "";
                    }
                    
                    $whats = array();
                    $whats["datos"] = array();
                
                    $dato = array(
                        'var0' => $var0,
                        'var1' => $var1,
                        'var2' => $var2,
                        'var3' => $var3,
                        'var4' => $var4,
                        'var5' => $var5,
                        'var6' => $var6,
                        'var7' => $var7,
                        'var8' => $var8,
                        'var9' => $var9,
                        'var10' => $var10,
                        'var11' => $var11,
                        'var12' => $var12,
                        'var13' => $var13,
                        'var14' => $var14,
                        'var15' => $var15,
                        'var16' => $var16,
                        'var17' => $var17,
                        'var18' => $var18,
                        'var19' => $var19,
                        'var20' => $var20,
                        'var21' => $var21,
                        'var22' => $var22,
                        'var23' => $var23,
                        'var24' => $var24,
                        'var25' => $var25,
                        'var26' => $var26,
                        'var27' => $var27,
                        'var28' => $var28,
                        'var29' => $var29,
                        'var30' => $var30,
                    );
                    //echo json_encode($dato);
                    date_default_timezone_set('America/Denver');
                    $fecha = date('d/m/Y H:i:s');
                    $fecha_actual = date('d/m/Y');
                    $hora_actual = date('H:i:s');
                    $fecha_invertida = date('Y').date('m').date('d');

                    //CONDICION DE LA MAQUINA
                    $condicion =$var2 & 128;

                    //ESTADO DE LAS SALIDAS
                    $salida1 = $var2 & 1;
                    $salida2 = $var2 & 2;
                    $salida3 = $var2 & 4;

                    //RELOJ
                    $clock = $var5.":".$var4;
                
                    //DIA DE LA SEMANA
                    $wd = $var6;

                    //TEMPERATURA Y HUMEDAD
                    $temperatura_signo = floor($var7/16);
                    $temperatura_digito1 = fmod($var7, 16);
                    $temperatura_digito2 = floor($var8/16);
                    $temperatura_decimal = fmod($var8, 16);
                
                    $humedad_digito1 = fmod($var9, 16);
                    $humedad_digito2 = floor($var10/16);
                    $humedad_decimal = fmod($var10, 16);
                    
                    if($temperatura_signo == 8)
                    {
                        $signo = "-";
                    }
                    else
                    {
                        $signo = "";    
                    }
                
                    $temp = $signo.$temperatura_digito1.$temperatura_digito2.".".$temperatura_decimal;
                    $hum = $humedad_digito1.$humedad_digito2.".".$humedad_decimal;

                    //AJUSTE DE TEMPERATURA Y HUMEDAD
                    $var11 = $var11 * 128;
                    $ajuste_temp_signo = floor($var11/16);
                    $ajuste_temp_digito1 = fmod($var11, 16);
                    $ajuste_temp_digito2 = floor($var12/16);
                    $ajuste_temp_decimal = fmod($var12, 16);

                    $var13 = $var13 * 128;
                    $ajuste_hum_signo = floor($var13/16);
                    $ajuste_hum_digito1 = fmod($var13, 16);
                    $ajuste_hum_digito2 = floor($var14/16);
                    $ajuste_hum_decimal = fmod($var14, 16);

                    if($ajuste_temp_signo == 8)
                    {
                        $signo = "-";
                    }
                    else
                    {
                        $signo = "";    
                    }

                    if($ajuste_hum_signo == 8)
                    {
                        $signo_hum = "-";
                    }
                    else
                    {
                        $signo_hum = "";    
                    }

                    $ajuste_temp = $signo.$ajuste_temp_digito1.$ajuste_temp_digito2.".".$ajuste_temp_decimal;
                    $ajuste_hum = $signo_hum.$ajuste_hum_digito1.$ajuste_hum_digito2.".".$ajuste_hum_decimal;
                    $actualizar = Maquina::where('id_maquina', $var0)
                    ->update([
                        'estatus_estado_id' => $condicion,
                        'reloj' => $clock,
                        'dia_id' => $wd,
                        'temperatura' => $temp,
                        'humedad' => $hum,
                        'ajuste_temperatura' => $ajuste_temp,
                        'ajuste_humedad' => $ajuste_hum,
                        'chorizo' => $chorizo,
                    ]);

                    /*SALIDAS*/
                    $modo_salida1 = $var15;
                    $modo_salida2 = $var20;
                    $modo_salida3 = $var25;

                    $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 1)
                    ->update([
                        'estatus_estado_id' => $salida1,
                        'modo_salida' => $modo_salida1,
                    ]);

                    $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 2)
                    ->update([
                        'estatus_estado_id' => $salida2,
                        'modo_salida' => $modo_salida2,
                    ]);

                    $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 3)
                    ->update([
                        'estatus_estado_id' => $salida3,
                        'modo_salida' => $modo_salida3,
                    ]);

                    if($modo_salida1 == 0)
                    {
                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 1)
                        ->update([
                            'parametro1' => 0,
                            'parametro2' => 0,
                            'parametro3' => 0,
                            'parametro4' => 0,
                        ]);
                    }
                    else
                    {
                        $parametro1 = 0;
                        $parametro2 = 0;
                        $parametro3 = 0;
                        $parametro4 = 0;

                        if($modo_salida1 == 16)
                        {
                            $temp_para1_signo = floor($var16/16);
                            $temp_para1_digito1 = fmod($var16, 16);
                            $temp_para1_digito2 = floor($var17/16);
                            $temp_para1_decimal = fmod($var17, 16);

                            if($temp_para1_signo == 8)
                            {
                                $signo = "-";
                            }
                            else
                            {
                                $signo = "";    
                            }

                            $temp_para2_signo = floor($var18/16);
                            $temp_para2_digito1 = fmod($var18, 16);
                            $temp_para2_digito2 = floor($var19/16);
                            $temp_para2_decimal = fmod($var19, 16);

                            if($temp_para2_signo == 8)
                            {
                                $signo2 = "-";
                            }
                            else
                            {
                                $signo2 = "";    
                            }

                            $parametro1 = $signo.$temp_para1_digito1.$temp_para1_digito2.".".$temp_para1_decimal;
                            $parametro2 = $signo2.$temp_para2_digito1.$temp_para2_digito2.".".$temp_para2_decimal;

                        }
                        else
                        {
                            if($modo_salida1 == 32)
                            {
                                $hum_para1_digito1 = fmod($var16, 16);
                                $hum_para1_digito2 = floor($var17/16);
                                $hum_para1_decimal = fmod($var17, 16);

                                $hum_para2_digito1 = fmod($var18, 16);
                                $hum_para2_digito2 = floor($var19/16);
                                $hum_para2_decimal = fmod($var19, 16);

                                $parametro1 = $hum_para1_digito1.$hum_para1_digito2.".".$hum_para1_decimal;
                                $parametro2 = $hum_para2_digito1.$hum_para2_digito2.".".$hum_para2_decimal;
                            }
                            else
                            {
                                if($modo_salida1 == 48)
                                {
                                    $hora = dechex($var16);
                                    $cant_hora = strlen($hora);
                                    if($cant_hora < 2)
                                    {
                                        if($hora == 0)
                                        {
                                            $hora = "00";
                                        }
                                        else
                                        {
                                            $hora = "0".$hora;
                                        }
                                    }

                                    $min = dechex($var17);
                                    $cant_min = strlen($min);
                                    if($cant_min < 2)
                                    {
                                        if($min == 0)
                                        {
                                            $min = "00";
                                        }
                                        else
                                        {
                                            $min = "0".$min;
                                        }
                                    }

                                    $hora2 = dechex($var18);
                                    $cant_hora2 = strlen($hora2);
                                    if($cant_hora2 < 2)
                                    {
                                        if($hora2 == 0)
                                        {
                                            $hora2 = "00";
                                        }
                                        else
                                        {
                                            $hora2 = "0".$hora2;
                                        }
                                    }

                                    $min2 = dechex($var19);
                                    $cant_min2 = strlen($min2);
                                    if($cant_min2 < 2)
                                    {
                                        if($min2 == 0)
                                        {
                                            $min2 = "00";
                                        }
                                        else
                                        {
                                            $min2 = "0".$min2;
                                        }
                                    }

                                    $parametro1 = $hora.":".$min;
                                    $parametro2 = $hora2.":".$min2;

                                }
                                else
                                {
                                    if($modo_salida1 == 64)
                                    {
                                        $parametro1 = $var16;
                                        $parametro2 = $var17;
                                        $parametro3 = $var18;
                                        $parametro4 = $var19;
                                    }
                                }
                            }
                        }

                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 1)
                        ->update([
                            'parametro1' => $parametro1,
                            'parametro2' => $parametro2,
                            'parametro3' => $parametro3,
                            'parametro4' => $parametro4,
                        ]);
                    }

                    if($modo_salida2 == 0)
                    {
                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 2)
                        ->update([
                            'parametro1' => 0,
                            'parametro2' => 0,
                            'parametro3' => 0,
                            'parametro4' => 0,
                        ]);
                    }
                    else
                    {
                        $parametro1 = 0;
                        $parametro2 = 0;
                        $parametro3 = 0;
                        $parametro4 = 0;

                        if($modo_salida2 == 16)
                        {
                            $temp_para1_signo = floor($var21/16);
                            $temp_para1_digito1 = fmod($var21, 16);
                            $temp_para1_digito2 = floor($var22/16);
                            $temp_para1_decimal = fmod($var22, 16);

                            if($temp_para1_signo == 8)
                            {
                                $signo = "-";
                            }
                            else
                            {
                                $signo = "";    
                            }

                            $temp_para2_signo = floor($var23/16);
                            $temp_para2_digito1 = fmod($var23, 16);
                            $temp_para2_digito2 = floor($var24/16);
                            $temp_para2_decimal = fmod($var24, 16);

                            if($temp_para2_signo == 8)
                            {
                                $signo2 = "-";
                            }
                            else
                            {
                                $signo2 = "";    
                            }

                            $parametro1 = $signo.$temp_para1_digito1.$temp_para1_digito2.".".$temp_para1_decimal;
                            $parametro2 = $signo2.$temp_para2_digito1.$temp_para2_digito2.".".$temp_para2_decimal;
                        }
                        else
                        {
                            if($modo_salida2 == 32)
                            {
                                $hum_para1_digito1 = fmod($var21, 16);
                                $hum_para1_digito2 = floor($var22/16);
                                $hum_para1_decimal = fmod($var22, 16);

                                $hum_para2_digito1 = fmod($var23, 16);
                                $hum_para2_digito2 = floor($var24/16);
                                $hum_para2_decimal = fmod($var24, 16);

                                $parametro1 = $hum_para1_digito1.$hum_para1_digito2.".".$hum_para1_decimal;
                                $parametro2 = $hum_para2_digito1.$hum_para2_digito2.".".$hum_para2_decimal;
                            }
                            else
                            {
                                if($modo_salida2 == 48)
                                {
                                    $hora = dechex($var21);
                                    $cant_hora = strlen($hora);
                                    if($cant_hora < 2)
                                    {
                                        if($hora == 0)
                                        {
                                            $hora = "00";
                                        }
                                        else
                                        {
                                            $hora = "0".$hora;
                                        }
                                    }

                                    $min = dechex($var22);
                                    $cant_min = strlen($min);
                                    if($cant_min < 2)
                                    {
                                        if($min == 0)
                                        {
                                            $min = "00";
                                        }
                                        else
                                        {
                                            $min = "0".$min;
                                        }
                                    }

                                    $hora2 = dechex($var23);
                                    $cant_hora2 = strlen($hora2);
                                    if($cant_hora2 < 2)
                                    {
                                        if($hora2 == 0)
                                        {
                                            $hora2 = "00";
                                        }
                                        else
                                        {
                                            $hora2 = "0".$hora2;
                                        }
                                    }

                                    $min2 = dechex($var24);
                                    $cant_min2 = strlen($min2);
                                    if($cant_min2 < 2)
                                    {
                                        if($min2 == 0)
                                        {
                                            $min2 = "00";
                                        }
                                        else
                                        {
                                            $min2 = "0".$min2;
                                        }
                                    }

                                    $parametro1 = $hora.":".$min;
                                    $parametro2 = $hora2.":".$min2;
                                }
                                else
                                {
                                    if($modo_salida2 == 64)
                                    {
                                        $parametro1 = $var21;
                                        $parametro2 = $var22;
                                        $parametro3 = $var23;
                                        $parametro4 = $var24;
                                    }
                                }
                            }
                        }

                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 2)
                        ->update([
                            'parametro1' => $parametro1,
                            'parametro2' => $parametro2,
                            'parametro3' => $parametro3,
                            'parametro4' => $parametro4,
                        ]);
                    }

                    if($modo_salida3 == 0)
                    {
                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 3)
                        ->update([
                            'parametro1' => 0,
                            'parametro2' => 0,
                            'parametro3' => 0,
                            'parametro4' => 0,
                        ]);
                    }
                    else
                    {
                        $parametro1 = 0;
                        $parametro2 = 0;
                        $parametro3 = 0;
                        $parametro4 = 0;

                        if($modo_salida3 == 16)
                        {
                            $temp_para1_signo = floor($var26/16);
                            $temp_para1_digito1 = fmod($var26, 16);
                            $temp_para1_digito2 = floor($var27/16);
                            $temp_para1_decimal = fmod($var27, 16);

                            if($temp_para1_signo == 8)
                            {
                                $signo = "-";
                            }
                            else
                            {
                                $signo = "";    
                            }

                            $temp_para2_signo = floor($var28/16);
                            $temp_para2_digito1 = fmod($var28, 16);
                            $temp_para2_digito2 = floor($var29/16);
                            $temp_para2_decimal = fmod($var29, 16);

                            if($temp_para2_signo == 8)
                            {
                                $signo2 = "-";
                            }
                            else
                            {
                                $signo2 = "";    
                            }

                            $parametro1 = $signo.$temp_para1_digito1.$temp_para1_digito2.".".$temp_para1_decimal;
                            $parametro2 = $signo2.$temp_para2_digito1.$temp_para2_digito2.".".$temp_para2_decimal;
                        }
                        else
                        {
                            if($modo_salida3 == 32)
                            {
                                $hum_para1_digito1 = fmod($var26, 16);
                                $hum_para1_digito2 = floor($var27/16);
                                $hum_para1_decimal = fmod($var27, 16);

                                $hum_para2_digito1 = fmod($var28, 16);
                                $hum_para2_digito2 = floor($var29/16);
                                $hum_para2_decimal = fmod($var29, 16);

                                $parametro1 = $hum_para1_digito1.$hum_para1_digito2.".".$hum_para1_decimal;
                                $parametro2 = $hum_para2_digito1.$hum_para2_digito2.".".$hum_para2_decimal;
                            }
                            else
                            {
                                if($modo_salida3 == 48)
                                {
                                    $hora = dechex($var26);
                                    $cant_hora = strlen($hora);
                                    if($cant_hora < 2)
                                    {
                                        if($hora == 0)
                                        {
                                            $hora = "00";
                                        }
                                        else
                                        {
                                            $hora = "0".$hora;
                                        }
                                    }

                                    $min = dechex($var27);
                                    $cant_min = strlen($min);
                                    if($cant_min < 2)
                                    {
                                        if($min == 0)
                                        {
                                            $min = "00";
                                        }
                                        else
                                        {
                                            $min = "0".$min;
                                        }
                                    }

                                    $hora2 = dechex($var28);
                                    $cant_hora2 = strlen($hora2);
                                    if($cant_hora2 < 2)
                                    {
                                        if($hora2 == 0)
                                        {
                                            $hora2 = "00";
                                        }
                                        else
                                        {
                                            $hora2 = "0".$hora2;
                                        }
                                    }

                                    $min2 = dechex($var29);
                                    $cant_min2 = strlen($min2);
                                    if($cant_min2 < 2)
                                    {
                                        if($min2 == 0)
                                        {
                                            $min2 = "00";
                                        }
                                        else
                                        {
                                            $min2 = "0".$min2;
                                        }
                                    }

                                    $parametro1 = $hora.":".$min;
                                    $parametro2 = $hora2.":".$min2;
                                }
                                else
                                {
                                    if($modo_salida3 == 64)
                                    {
                                        $parametro1 = $var26;
                                        $parametro2 = $var27;
                                        $parametro3 = $var28;
                                        $parametro4 = $var29;
                                    }
                                }
                            }
                        }

                        $actualizar = MaquinasSalida::where('id_maquina', $var0)
                        ->where('salida', 3)
                        ->update([
                            'parametro1' => $parametro1,
                            'parametro2' => $parametro2,
                            'parametro3' => $parametro3,
                            'parametro4' => $parametro4,
                        ]);
                    }

                    $estatus_sistema = 0;
                    $cambio37 = Maquina::where('id_maquina', $var0)->where('estatus_sistema', 1)->count();
                    if($cambio37 > 0)
                    {
                        $estatus_sistema = 1;
                    }
                    else
                    {
                        $estatus_sistema = 0;
                    }

                    /*ENVIANDO DATOS DEL USUARIO*/
                    $camb_estatus = 0;
                    $cambio_ = Maquina::where('id_maquina', $var0)->where('estatus_device', 1)->count();
                    if($cambio_ > 0)
                    {
                        $cambio_reloj = Maquina::where('id_maquina', $var0)->where('estatus_device', 1)->first();

                        $camb_estatus = $cambio_reloj->estatus_device;
                        $time = $cambio_reloj->reloj_solicitado;
                        $day = $cambio_reloj->dia_solicitado;

                        $partes_output = explode(":", $time);
                        if(isset($partes_output[0]))
                        {
                            $hora_output = $partes_output[0];
                        } 
                        else
                        {
                            $hora_output = "";
                        }
                        if(isset($partes_output[1]))
                        {
                            $minutos_output = $partes_output[1];
                        } 
                        else
                        {
                            $minutos_output = "";
                        }
                    }
                    else
                    {
                        $camb_estatus = 0;
                    }

                    $modos1='0';
                    $cambio1 = MaquinasSalida::where('id_maquina', $var0)->where('salida', 1)->first();
                    $cam1 = $cambio1->estatus_parametros;
                    if($cambio1->modo_salida_solicitado == 0)
                    {
                        $modos1 = '0';
                    }
                    else
                    {
                        if($cambio1->modo_salida_solicitado == 16)
                        {
                            $modos1 = '10';
                        }
                        else
                        {
                            if($cambio1->modo_salida_solicitado == 32)
                            {
                                $modos1 = '20';
                            }
                            else
                            {
                                if($cambio1->modo_salida_solicitado == 48)
                                {
                                    $modos1 = '30';
                                }
                                else
                                {
                                    if($cambio1->modo_salida_solicitado == 64)
                                    {
                                        $modos1 = '40';
                                    }
                                }
                            }
                        }
                    }
                    $para1s1 = $cambio1->parametro1_solicitado;
                    $para2s1 = $cambio1->parametro2_solicitado;
                    $para3s1 = $cambio1->parametro3_solicitado;
                    $para4s1 = $cambio1->parametro4_solicitado;
                    $estatus_estatus_valor1 = $cambio1->estatus_salida_manual;

                    $modos2='0';
                    $cambio2 = MaquinasSalida::where('id_maquina', $var0)->where('salida', 2)->first();
                    $cam2 = $cambio2->estatus_parametros;
                    if($cambio2->modo_salida_solicitado == 0)
                    {
                        $modos2 = '0';
                    }
                    else
                    {
                        if($cambio2->modo_salida_solicitado == 16)
                        {
                            $modos2 = '10';
                        }
                        else
                        {
                            if($cambio2->modo_salida_solicitado == 32)
                            {
                                $modos2 = '20';
                            }
                            else
                            {
                                if($cambio2->modo_salida_solicitado == 48)
                                {
                                    $modos2 = '30';
                                }
                                else
                                {
                                    if($cambio2->modo_salida_solicitado == 64)
                                    {
                                        $modos2 = '40';
                                    }
                                }
                            }
                        }
                    }
                    $para1s2 = $cambio2->parametro1_solicitado;
                    $para2s2 = $cambio2->parametro2_solicitado;
                    $para3s2 = $cambio2->parametro3_solicitado;
                    $para4s2 = $cambio2->parametro4_solicitado;
                    $estatus_estatus_valor2 = $cambio2->estatus_salida_manual;

                    $modos3='0';
                    $cambio3 = MaquinasSalida::where('id_maquina', $var0)->where('salida', 3)->first();
                    $cam3 = $cambio3->estatus_parametros;
                    if($cambio3->modo_salida_solicitado == 0)
                    {
                        $modos3 = '0';
                    }
                    else
                    {
                        if($cambio3->modo_salida_solicitado == 16)
                        {
                            $modos3 = '10';
                        }
                        else
                        {
                            if($cambio3->modo_salida_solicitado == 32)
                            {
                                $modos3 = '20';
                            }
                            else
                            {
                                if($cambio3->modo_salida_solicitado == 48)
                                {
                                    $modos3 = '30';
                                }
                                else
                                {
                                    if($cambio3->modo_salida_solicitado == 64)
                                    {
                                        $modos3 = '40';
                                    }
                                }
                            }
                        }
                    }
                    $para1s3 = $cambio3->parametro1_solicitado;
                    $para2s3 = $cambio3->parametro2_solicitado;
                    $para3s3 = $cambio3->parametro3_solicitado;
                    $para4s3 = $cambio3->parametro4_solicitado;
                    $estatus_estatus_valor3 = $cambio3->estatus_salida_manual;

                    $cambio3 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste', 1)->count();
                    if($cambio3 > 0)
                    {
                        $cambio4 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste', 1)->first();
                    
                        $signo_ajuste = $cambio4->signo_ajuste;
                        $entero_ajuste = $cambio4->entero_ajuste;
                        $punto_ajuste = $cambio4->punto_ajuste;
                        $decimal_ajuste = $cambio4->decimal_ajuste;
                        $estatus_ajuste = 1;
                    }
                    else
                    {
                        $estatus_ajuste = 0;
                    }

                    $cambio5 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste_hum', 1)->count();
                    if($cambio5 > 0)
                    {
                        $cambio6 = Maquina::where('id_maquina', $var0)->where('estatus_ajuste_hum', 1)->first();
                    
                        $signo_ajuste_hum = $cambio6->signo_ajuste_hum;
                        $entero_ajuste_hum = $cambio6->entero_ajuste_hum;
                        $decimal_ajuste_hum = $cambio6->decimal_ajuste_hum;
                        $estatus_ajuste_hum = 1;
                    }
                    else
                    {
                        $estatus_ajuste_hum = 0;
                    }

                    if($estatus_sistema == 1)
                    {
                        $dato = array(
                        'a' => '1',
                        'b' => '5',
                        'c' => '60',
                        'd' => '0',
                        'e' => '0',
                        'f' => '0',
                        'g' => '0',
                        'h' => '0',
                        'i' => '0',
                        );
            
                        $actualizar = Maquina::where('id_maquina', $var0)->update([
                            'estatus_sistema' => 0,
                        ]);    
                    }
                    else
                    {
                        if($camb_estatus == 1)
                        {
                            $dato = array(
                                'a' => '1',
                                'b' => '8',
                                'c' => '21',
                                'd' => '0',
                                'e' => $minutos_output,
                                'f' => $hora_output,
                                'g' => $day,
                                'h' => '0',
                                'i' => '0',
                            );

                            $actualizar = Maquina::where('id_maquina', $var0)->update([
                                'estatus_device' => 0,
                            ]);
                        }
                        else
                        {
                            if($estatus_estatus_valor1 == 1)
                            {
                                $dato = array(
                                'a' => '1',
                                'b' => '5',
                                'c' => '51',
                                'd' => '1',
                                'e' => '0',
                                'f' => '0',
                                'g' => '0',
                                'h' => '0',
                                'i' => '0',
                                );

                                $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 1)->update([
                                    'estatus_salida_manual' => 0,
                                ]);
                            }
                            else
                            {
                                if($estatus_estatus_valor2 == 1)
                                {
                                    $dato = array(
                                    'a' => '1',
                                    'b' => '5',
                                    'c' => '51',
                                    'd' => '2',
                                    'e' => '0',
                                    'f' => '0',
                                    'g' => '0',
                                    'h' => '0',
                                    'i' => '0',
                                    );

                                    $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 2)->update([
                                        'estatus_salida_manual' => 0,
                                    ]);
                                }
                                else
                                {
                                    if($estatus_estatus_valor3 == 1)
                                    {
                                        $dato = array(
                                        'a' => '1',
                                        'b' => '5',
                                        'c' => '51',
                                        'd' => '4',
                                        'e' => '0',
                                        'f' => '0',
                                        'g' => '0',
                                        'h' => '0',
                                        'i' => '0',
                                        );

                                        $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 3)->update([
                                            'estatus_salida_manual' => 0,
                                        ]);
                                    }
                                    else
                                    {
                                        if($cam1 == 1)
                                        {
                                            $dato = array(
                                                'a' => '1',
                                                'b' => '10',
                                                'c' => '40',
                                                'd' => $modos1,
                                                'e' => $para1s1,
                                                'f' => $para2s1,
                                                'g' => $para3s1,
                                                'h' => $para4s1,
                                                'i' => '0',
                                            );

                                            $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 1)->update([
                                                'estatus_parametros' => 0,
                                            ]);
                                        }
                                        else
                                        {
                                            if($cam2 == 1)
                                            {
                                                $dato = array(
                                                    'a' => '1',
                                                    'b' => '10',
                                                    'c' => '41',
                                                    'd' => $modos2,
                                                    'e' => $para1s2,
                                                    'f' => $para2s2,
                                                    'g' => $para3s2,
                                                    'h' => $para4s2,
                                                    'i' => '0',
                                                );

                                                $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 2)->update([
                                                    'estatus_parametros' => 0,
                                                ]);
                                            }
                                            else
                                            {
                                                if($cam3 == 1)
                                                {
                                                    $dato = array(
                                                        'a' => '1',
                                                        'b' => '10',
                                                        'c' => '42',
                                                        'd' => $modos3,
                                                        'e' => $para1s3,
                                                        'f' => $para2s3,
                                                        'g' => $para3s3,
                                                        'h' => $para4s3,
                                                        'i' => '0',
                                                    );

                                                    $actualizar = MaquinasSalida::where('id_maquina', $var0)->where('salida', 3)->update([
                                                        'estatus_parametros' => 0,
                                                    ]);
                                                }
                                                else
                                                {
                                                    if($estatus_ajuste == 1)
                                                    {
                                                        $dato = array(
                                                            'a' => '1',
                                                            'b' => '7',
                                                            'c' => '11',
                                                            'd' => '0',
                                                            'e' => $signo_ajuste,
                                                            'f' => $entero_ajuste.$decimal_ajuste,
                                                            'g' => '0',
                                                            'h' => '0',
                                                            'i' => '0',
                                                        );

                                                        $actualizar = Maquina::where('id_maquina', $var0)->update([
                                                            'estatus_ajuste' => 0,
                                                        ]);
                                                    }
                                                    else
                                                    {
                                                        if($estatus_ajuste_hum == 1)
                                                        {
                                                            $dato = array(
                                                                'a' => '1',
                                                                'b' => '7',
                                                                'c' => '11',
                                                                'd' => '1',
                                                                'e' => $signo_ajuste_hum,
                                                                'f' => $entero_ajuste_hum.$decimal_ajuste_hum,
                                                                'g' => '0',
                                                                'h' => '0',
                                                                'i' => '0',
                                                            );

                                                            $actualizar = Maquina::where('id_maquina', $var0)->update([
                                                                'estatus_ajuste_hum' => 0,
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
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    echo json_encode($dato);
                    json_encode($dato);

                    /*FIN DE ENVIAR INFORMACION*/
                }
                /*FIN DE LAS SALIDAS*/

                /*DISPARANDO EL REVERB*/
                MessageSent::dispatch();
            }
        }
    }
}
