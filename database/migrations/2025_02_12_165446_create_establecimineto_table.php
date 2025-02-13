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
        Schema::create('establecimineto', function (Blueprint $table) {
            $table->comment('Tabla para almacenar detalles de las sedes');
            $table->integer('id', true)->comment('Identificador único para la sede');
            $table->string('nombre')->comment('Nombre de la sede');
            $table->string('telefono', 20)->comment('Número de contacto de la sede');
            $table->integer('idRedSalud')->index('idredsalud')->comment('Referencia al departamento');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado de la sede (0 = Inactivo, 1 = Activo)');
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
        Schema::dropIfExists('establecimineto');
    }
};
