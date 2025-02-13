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
        Schema::table('videoseguimiento', function (Blueprint $table) {
            $table->foreign(['idDosis'], 'videoseguimiento_ibfk_1')->references(['id'])->on('dosis')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videoseguimiento', function (Blueprint $table) {
            $table->dropForeign('videoseguimiento_ibfk_1');
        });
    }
};
