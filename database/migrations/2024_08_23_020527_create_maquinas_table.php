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
        Schema::create('maquinas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('id_maquina', 15)->nullable();
            $table->integer('modelo')->nullable()->default(3);
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->string('latitud', 10)->nullable();
            $table->string('longitud', 20)->nullable();
            $table->bigInteger('usuario_lectura')->unsigned()->nullable();
            $table->string('nombre', 20)->nullable();
            $table->Integer('estatus_device')->nullable();
            $table->string('reloj', 20)->nullable();
            $table->bigInteger('dia_id')->unsigned()->nullable();
            $table->double('temperatura',4,1)->nullable();
            $table->double('humedad',4,1)->nullable();
            $table->double('ajuste_temperatura',4,1)->nullable();
            $table->double('ajuste_humedad',4,1)->nullable();
            $table->string('deshielo', 15)->nullable();
            $table->string('qr', 20)->nullable();
            $table->Integer('numero_salidas')->nullable();
            $table->Integer('estatus_estado_id')->nullable();
            $table->Integer('estatus_maquina_id')->nullable();
            $table->Integer('maquina_registrada')->nullable()->default(0);
            $table->string('signo_ajuste', 2)->nullable();
            $table->string('entero_ajuste', 2)->nullable();
            $table->string('punto_ajuste', 2)->nullable();
            $table->string('decimal_ajuste', 2)->nullable();
            $table->string('estatus_ajuste', 1)->nullable();
            $table->string('signo_ajuste_hum', 2)->nullable();
            $table->string('entero_ajuste_hum', 2)->nullable();
            $table->string('punto_ajuste_hum', 2)->nullable();
            $table->string('decimal_ajuste_hum', 2)->nullable();
            $table->string('estatus_ajuste_hum', 1)->nullable();
            $table->string('estatus_sistema', 1)->nullable();
            $table->double('voltaje', 4, 1)->nullable();
            $table->double('factor_voltaje', 4, 1)->nullable();
            $table->double('ajuste_voltaje', 4, 1)->nullable();
            $table->string('estatus_voltaje', 1)->nullable();

            $table->double('lectura_minima', 10, 2)->nullable();
            $table->double('lectura_maxima', 10, 2)->nullable();
            $table->string('email1', 100)->nullable();
            $table->string('email2', 100)->nullable();
            $table->string('email3', 100)->nullable();

            $table->string('dia_solicitado', 20)->nullable();
            $table->string('reloj_solicitado', 20)->nullable();

            $table->bigInteger('estatus_id')->unsigned()->nullable();
            $table->Integer('encendido_permanente')->nullable()->default(0);

            $table->string('chorizo', 255)->nullable();

            $table->timestamps();

            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_lectura')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dia_id')->references('id')->on('dias')->onDelete('cascade');
            $table->foreign('estatus_id')->references('id')->on('estatus_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinas');
    }
};
