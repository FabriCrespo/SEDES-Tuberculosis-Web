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
        Schema::table('establecimineto', function (Blueprint $table) {
            $table->foreign(['idRedSalud'], 'establecimineto_ibfk_1')->references(['id'])->on('redsalud')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('establecimineto', function (Blueprint $table) {
            $table->dropForeign('establecimineto_ibfk_1');
        });
    }
};
