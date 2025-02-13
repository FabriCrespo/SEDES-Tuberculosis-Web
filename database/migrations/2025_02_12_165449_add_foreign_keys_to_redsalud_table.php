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
        Schema::table('redsalud', function (Blueprint $table) {
            $table->foreign(['idSede'], 'redsalud_ibfk_1')->references(['id'])->on('sede')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('redsalud', function (Blueprint $table) {
            $table->dropForeign('redsalud_ibfk_1');
        });
    }
};
