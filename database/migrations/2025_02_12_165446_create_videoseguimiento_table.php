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
        Schema::create('videoseguimiento', function (Blueprint $table) {
            $table->comment('Tabla para almacenar videos de seguimiento de los pacientes.');
            $table->integer('id', true)->comment('Identificador único para el video de seguimiento');
            $table->integer('idDosis')->index('iddosis')->comment('Referencia a la dosis asociada');
            $table->string('video')->comment('Almacen del video de seguimiento');
            $table->text('descripcion')->nullable()->comment('Descripción opcional del video');
            $table->dateTime('fechaGrabacion')->comment('Fecha y hora de la grabación del video');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado del video (0 = Inactivo, 1 = Activo)');
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
        Schema::dropIfExists('videoseguimiento');
    }
};
