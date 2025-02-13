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
        Schema::create('tratamientomedicamento', function (Blueprint $table) {
            $table->comment('Tabla para relacionar tratamientos con medicamentos');
            $table->integer('id', true)->comment('Identificador único para la relación tratamiento-medicamento');
            $table->integer('idTratamiento')->index('idtratamiento')->comment('Referencia al tratamiento asociado');
            $table->integer('idMedicamento')->index('idmedicamento')->comment('Referencia al medicamento asociado');
            $table->integer('cantidad')->comment('Cantidad del medicamento asignado');
            $table->timestamp('fechaRegistro')->nullable()->useCurrent()->comment('Fecha y hora de registro');
            $table->integer('registradoPor')->comment('ID del usuario que realizó el registro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientomedicamento');
    }
};
