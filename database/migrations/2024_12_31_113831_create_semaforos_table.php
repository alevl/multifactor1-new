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
        Schema::create('semaforos', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('id_maquina', 15)->nullable();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->bigInteger('propietario_id')->unsigned()->nullable();
            $table->bigInteger('usuario_lectura')->unsigned()->nullable();
            $table->string('nombre', 20)->nullable();
            $table->Integer('luz1')->nullable();
            $table->Integer('luz2')->nullable();
            $table->Integer('luz3')->nullable();
            $table->Integer('luz4')->nullable();
            $table->Integer('luz5')->nullable();
            $table->Integer('luz6')->nullable();
            $table->Integer('luz7')->nullable();
            $table->Integer('luz8')->nullable();
            $table->Integer('estatus_device')->nullable();
            $table->Integer('solicitud')->nullable();
            $table->string('chorizo', 255)->nullable();

            $table->timestamps();

            $table->foreign('propietario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_lectura')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semaforos');
    }
};
