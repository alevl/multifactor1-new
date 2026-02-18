<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maquinas_salidas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('maquina_id')->unsigned()->nullable();
            $table->string('id_maquina', 15)->nullable();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->string('nombre', 20)->nullable();
            $table->Integer('salida')->nullable();
            $table->string('hora_encendido', 20)->nullable();
            $table->string('hora_apagado', 20)->nullable();
            $table->Integer('estatus_estado_id')->nullable();
            $table->Integer('estatus_maquina_id')->nullable();
            $table->Integer('uno')->nullable();
            $table->Integer('dos')->nullable();
            $table->Integer('tres')->nullable();
            $table->Integer('cuatro')->nullable();
            $table->double('point', 10, 1)->nullable();
            $table->string('set_point1_entero', 20)->nullable();
            $table->string('set_point1_decimal', 20)->nullable();
            $table->string('set_point2_entero', 20)->nullable();
            $table->string('set_point2_decimal', 20)->nullable();
            $table->Integer('estatus_turn')->nullable();
            $table->Integer('estatus_point')->nullable();
            $table->Integer('estatus_salida_manual')->nullable();
            $table->Integer('cambiar_estatus_salida')->nullable();
            $table->double('point1', 10, 1)->nullable();
            $table->double('point2', 10, 1)->nullable();
            $table->string('modo_salida_solicitado', 20)->nullable();
            $table->string('turnon_solicitado', 20)->nullable();
            $table->string('turnoff_solicitado', 20)->nullable();
            $table->string('setpoint_solicitado', 20)->nullable();
            $table->Integer('estatus_frecuencia')->nullable();
            $table->string('frecuencia_solicitado', 11)->nullable();
            $table->string('duracion_solicitado', 11)->nullable();
            $table->integer('mostrar_frecuencia')->nullable();
            $table->integer('mostrar_duracion')->nullable();
        
            $table->string('modo_salida', 20)->nullable();
            $table->string('parametro1', 20)->nullable();
            $table->string('parametro2', 20)->nullable();
            $table->string('parametro3', 20)->nullable();
            $table->string('parametro4', 20)->nullable();
            $table->string('parametro1_solicitado', 20)->nullable();
            $table->string('parametro2_solicitado', 20)->nullable();
            $table->string('parametro3_solicitado', 20)->nullable();
            $table->string('parametro4_solicitado', 20)->nullable();
            $table->Integer('estatus_parametros')->nullable();

            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('maquinas')->onDelete('cascade');
            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinas_salidas');
    }
};
