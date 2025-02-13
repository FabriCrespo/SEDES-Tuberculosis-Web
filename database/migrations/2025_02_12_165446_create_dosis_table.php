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
        Schema::create('dosis', function (Blueprint $table) {
            $table->comment('Tabla para almacenar detalles de las dosis asociadas a tratamientos.');
            $table->integer('id', true)->comment('Identificador único para la dosis');
            $table->integer('numeroDosis')->comment('Número de la dosis en el tratamiento');
            $table->dateTime('fechaDosis')->comment('Fecha y hora programada para tomar la dosis');
            $table->dateTime('fecha')->nullable()->comment('Fecha y hora en la que se tomó la dosis');
            $table->char('extension', 1)->nullable()->default('0')->comment('Indica si la dosis fue extendida (0 = No, 1 = Sí)');
            $table->enum('estado', ['Pendiente', 'Completada', 'Cancelada'])->default('Pendiente')->comment('Estado de la dosis');
            $table->integer('idTratamiento')->index('idtratamiento')->comment('Referencia al tratamiento asociado');
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
        Schema::dropIfExists('dosis');
    }
};
