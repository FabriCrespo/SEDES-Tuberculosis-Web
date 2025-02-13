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
        Schema::create('tratamiento', function (Blueprint $table) {
            $table->comment('Tabla para almacenar tratamientos de pacientes');
            $table->integer('id', true)->comment('Identificador único para el tratamiento');
            $table->char('fase', 1)->comment('Fase del tratamiento (0 = Primera, 1 = Segunda)');
            $table->date('fechaInicio')->comment('Fecha de inicio del tratamiento');
            $table->date('fechaFin')->comment('Fecha de finalización del tratamiento');
            $table->integer('dosisTotales')->comment('Cantidad total de dosis en el tratamiento');
            $table->integer('dosisCompletadas')->default(0)->comment('Cantidad de dosis completadas');
            $table->char('extendido', 1)->default('0')->comment('Indica si la fase fue extendida (0 = No, 1 = Sí)');
            $table->integer('idPaciente')->index('idpaciente')->comment('Referencia al paciente asociado');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado del tratamiento (0 = Inactivo, 1 = Activo)');
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
        Schema::dropIfExists('tratamiento');
    }
};
