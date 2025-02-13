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
        Schema::table('tratamientomedicamento', function (Blueprint $table) {
            $table->foreign(['idTratamiento'], 'tratamientomedicamento_ibfk_1')->references(['id'])->on('tratamiento')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idMedicamento'], 'tratamientomedicamento_ibfk_2')->references(['id'])->on('medicamento')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tratamientomedicamento', function (Blueprint $table) {
            $table->dropForeign('tratamientomedicamento_ibfk_1');
            $table->dropForeign('tratamientomedicamento_ibfk_2');
        });
    }
};
