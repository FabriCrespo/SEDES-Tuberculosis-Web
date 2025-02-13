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
        Schema::create('notificacion', function (Blueprint $table) {
            $table->comment('Tabla para almacenar notificaciones para los pacientes');
            $table->integer('id', true)->comment('Identificador único para las notificaciones');
            $table->text('mensaje')->comment('Mensaje de la notificación');
            $table->timestamp('fechaNotificacion')->comment('Fecha y hora de la notificación');
            $table->char('leido', 1)->nullable()->default('0')->comment('Estado de lectura (0 = No leída, 1 = Leída)');
            $table->integer('idUsuario')->index('idusuario')->comment('Referencia al paciente o Usuario');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado de la notificación (0 = Inactivo, 1 = Activo)');
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
        Schema::dropIfExists('notificacion');
    }
};
