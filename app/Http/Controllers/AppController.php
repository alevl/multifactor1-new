<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Dia;
use App\Models\Hora;
use App\Models\Minuto;
use App\Models\Maquina;
use App\Models\MaquinasSalida;

class AppController extends Controller
{
    public function dias()
    {
        try 
        {
            $registros = Dia::select('id', 'dias')->get();

            if ($registros->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $registros
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function horas()
    {
        try 
        {
            $registros = Hora::select('id', 'horas')->get();

            if ($registros->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $registros
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function minutos()
    {
        try 
        {
            $registros = Minuto::select('id', 'minutos')->get();

            if ($registros->isEmpty()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $registros
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function signos()
    {
        try 
        {
            $datos = [
                'positive' => 48,
                'negative' => 45,
            ];

            if (empty($datos)) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $datos
            ], 200);

        }
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function enteros()
    {
        try 
        {
            $datos = [
                [
                    'digito' => 0,
                    'codigo' => '48',
                ],
                [
                    'digito' => 1,
                    'codigo' => '49',
                ],
                [
                    'digito' => 2,
                    'codigo' => '50',
                ],
                [
                    'digito' => 3,
                    'codigo' => '51',
                ],
                [
                    'digito' => 4,
                    'codigo' => '52',
                ],
                [
                    'digito' => 5,
                    'codigo' => '53',
                ],
                [
                    'digito' => 6,
                    'codigo' => '54',
                ],
                [
                    'digito' => 7,
                    'codigo' => '55',
                ],
                [
                    'digito' => 8,
                    'codigo' => '56',
                ],
                [
                    'digito' => 9,
                    'codigo' => '57',
                ],
            ];

            if (empty($datos)) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $datos
            ], 200);

        }

        catch (\Exception $e) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function decimales()
    {
        try 
        {
            $datos = [
                '0' => '48',
                '1' => '49',
                '2' => '50',
                '3' => '51',
                '4' => '52',
                '5' => '53',
                '6' => '54',
                '7' => '55',
                '8' => '56',
                '9' => '57',
            ];

            if (empty($datos)) {
                return response()->json([
                    'status' => false,
                    'message' => 'No hay registros disponibles',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $datos
            ], 200);

        }
        catch (\Exception $e) 
        {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function calibrar_temperatura(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                ], 404); // Código 404 = No encontrado
            }

            $signo = dechex($request->signo);
            $entero = dechex($request->entero);
            $punto = dechex(46);
            $decimal = dechex($request->decimal);

            $actualizar = Maquina::where('id_maquina', $request->dispositivo)
            ->update([
                'signo_ajuste' => $signo,
                'entero_ajuste' => $entero,
                'punto_ajuste' => $punto,
                'decimal_ajuste' => $decimal,
                'estatus_ajuste' => 1,
            ]);

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => null
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function cambio_fecha(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            $actualizar = Maquina::where('id_maquina', $request->dispositivo)
            ->update([
                'estatus_device' => 1,
                'dia_solicitado' => $request->dia,
                'reloj_solicitado' => $request->hora.":".$request->minuto,
            ]);

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function setpoint(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            $point1 = $request->setpoint1;
            $point2 = $request->setpoint2;

            $parte_dos_1 = 0;
            $parte_dos_2 = 0;
            
            if($point1 < 0)
            {
                $point1 = $point1 * 10;
                $point1 = $point1 * (-1);
                $cociente = intdiv($point1, 100);
                $resto = ($point1 % 100);
                $cociente = $cociente + 128;
                $parte_uno_1 = dechex($cociente);
                $parte_uno_2 = $resto;
            } 
            else
            {
                $point1 = $point1 * 10;
                $cociente = intdiv($point1, 100);
                $resto = ($point1 % 100);
                $parte_uno_1 = dechex($cociente);
                $parte_uno_2 = $resto;
            }
                    
            if($point2 < 0)
            {
                $point2 = $point2 * 10;
                $point2 = $point2 * (-1);
                $cociente = intdiv($point2, 100);
                $resto = ($point2 % 100);
                $cociente = $cociente + 128;
                $parte_dos_1 = dechex($cociente);
                $parte_dos_2 = $resto;
            } 
            else
            {
                $point2 = $point2 * 10;
                $cociente = intdiv($point2, 100);
                $resto = ($point2 % 100);
                $parte_dos_1 = dechex($cociente);
                $parte_dos_2 = $resto;
            }

            $actualizar = MaquinasSalida::where('id_maquina', $request->dispositivo)
            ->where('salida', 1)
            ->update([
                'set_point1_entero' => $parte_uno_1,
                'set_point1_decimal' => $parte_uno_2,
                'set_point2_entero' => $parte_dos_1,
                'set_point2_decimal' => $parte_dos_2,
                'estatus_point' => 1,
            ]);

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function descongelamiento(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            $mostrar_frecuencia = $request->frecuencia;
            $mostrar_duracion = $request->duracion;
            $frecuencia = dechex($request->frecuencia);
            $duracion = dechex($request->duracion);

            $actualizar = MaquinasSalida::where('id_maquina', $request->dispositivo)
            ->where('salida', 2)
            ->update([
                'frecuencia_solicitado' => $frecuencia,
                'duracion_solicitado' => $duracion,
                'mostrar_frecuencia' => $mostrar_frecuencia,
                'mostrar_duracion' => $mostrar_duracion,
                'estatus_frecuencia' => 1,
            ]);

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function encendido_permanente(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            if($dispositivo->encendido_permanente == 1)
            {
                $actualizar = Maquina::where('id_maquina', $request->dispositivo)->update([
                    'encendido_permanente' => 0,
                ]);
            }
            else
            {
                $actualizar = Maquina::where('id_maquina', $request->dispositivo)->update([
                    'encendido_permanente' => 1,
                ]);
            }

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function encender_apagar(Request $request)
    {
        try
        {
            $dispositivo = Maquina::where('id_maquina', $request->dispositivo)->first();

            if (!$dispositivo) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404); // Código 404 = No encontrado
            }

            $actualizar = Maquina::where('id_maquina', $request->dispositivo)
            ->update([
                'estatus_sistema' => 1,
            ]);

            // Si el dispositivo existe, devolver los datos
            return response()->json([
                'status' => true,
                'message' => 'exito',
            ], 200); // Código 200 = OK

        } 
        catch (\Exception $e)
        {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Error al buscar el dispositivo',
                'error' => $e->getMessage()
            ], 500); // Código 500 = Error interno del servidor
        }
    }

    public function leer_dispositivo(Request $request)
    {
        try {
            $registro = Maquina::where('id_maquina', $request->dispositivo)
                ->select('id_maquina','estatus_estado_id','estatus_maquina_id','nombre','reloj','dia_id','temperatura','humedad','deshielo','encendido_permanente')
                ->first();
        
            if (!$registro) {
                return response()->json([
                    'status' => false,
                    'message' => 'El dispositivo no existe',
                    'data' => null
                ], 404);
            }
        
            return response()->json([
                'status' => true,
                'message' => 'exito',
                'data' => $registro,
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
