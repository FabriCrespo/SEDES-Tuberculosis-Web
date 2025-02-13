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
        Schema::create('paciente', function (Blueprint $table) {
            $table->comment('Tabla para almacenar detalles de pacientes');
            $table->integer('id')->primary()->comment('Identificador único para el paciente');
            $table->string('direccion')->nullable()->comment('Dirección del paciente');
            $table->string('celularEmergencia', 20)->nullable()->comment('Número de celular de emergencia');
            $table->date('fechaInicioTratamiento')->comment('Fecha de inicio del tratamiento');
            $table->integer('idusuarioAsignado')->nullable()->index('idusuarioasignado')->comment('ID del usuario asignado (doctor/enfermero)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
