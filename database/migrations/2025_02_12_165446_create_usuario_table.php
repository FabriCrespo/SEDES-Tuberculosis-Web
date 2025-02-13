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
        Schema::create('usuario', function (Blueprint $table) {
            $table->comment('Tabla para almacenar información de usuarios');
            $table->integer('id', true)->comment('Identificador único para el usuario');
            $table->string('ci')->comment('Número de cédula de identidad');
            $table->string('nombres')->comment('Nombres del usuario');
            $table->string('primerApellido')->comment('Primer apellido');
            $table->string('segundoApellido')->comment('Segundo apellido');
            $table->string('celular', 20)->nullable()->comment('Número de celular');
            $table->char('sexo', 1)->comment('Sexo (F = Femenino, M = Masculino)');
            $table->date('fechaNacimiento')->comment('Fecha de nacimiento');
            $table->string('nombre_usuario')->comment('Nombre de usuario para inicio de sesión');
            $table->string('contraseña')->comment('Contraseña del usuario');
            $table->enum('rol', ['Pasciente', 'Enfermero', 'Doctor', 'Supervisor'])->comment('Rol en el sistema');
            $table->integer('idEstablecimineto')->index('idestablecimineto')->comment('Referencia a la sede asociada');
            $table->char('estado', 1)->nullable()->default('1')->comment('Estado de la cuenta (0 = Inactivo, 1 = Activo)');
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
        Schema::dropIfExists('usuario');
    }
};
