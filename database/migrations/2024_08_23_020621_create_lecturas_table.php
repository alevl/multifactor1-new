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
        Schema::create('lecturas', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('maquina', 15)->nullable();
            $table->bigInteger('usuario_id')->unsigned()->nullable();
            $table->double('temperatura', 4, 1)->nullable();
            $table->double('humedad', 4, 1)->nullable();
            $table->string('fecha', 10)->nullable();
            $table->string('hora', 10)->nullable();
            $table->integer('fecha_invertida')->nullable();

            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturas');
    }
};
