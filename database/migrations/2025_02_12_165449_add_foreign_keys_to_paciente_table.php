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
        Schema::table('paciente', function (Blueprint $table) {
            $table->foreign(['id'], 'paciente_ibfk_1')->references(['id'])->on('usuario')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idusuarioAsignado'], 'paciente_ibfk_2')->references(['id'])->on('usuario')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paciente', function (Blueprint $table) {
            $table->dropForeign('paciente_ibfk_1');
            $table->dropForeign('paciente_ibfk_2');
        });
    }
};
