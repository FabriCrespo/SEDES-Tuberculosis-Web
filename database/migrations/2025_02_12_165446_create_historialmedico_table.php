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
        Schema::create('historialmedico', function (Blueprint $table) {
            $table->comment('Tabla para almacenar el historial médico de los pacientes');
            $table->integer('id', true)->comment('Identificador único para registros del historial médico');
            $table->text('descripcion')->comment('Descripción detallada del historial médico');
            $table->string('imagen')->comment('Ruta de la imagen relacionada al registro');
            $table->integer('idPaciente')->index('idpaciente')->comment('Referencia al paciente');
            $table->integer('idEstablecimineto')->index('idestablecimineto')->comment('Referencia a la sede asociada');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado del registro (0 = Inactivo, 1 = Activo)');
            $table->timestamp('fechaRegistro')->nullable()->useCurrent()->comment('Fecha y hora de registro');
            $table->dateTime('fechaActualizacion')->nullable()->comment('Fecha y hora de la última actualización');
            $table->integer('registradoPor')->comment('ID del usuario que realizó el registro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historialmedico');
    }
};
