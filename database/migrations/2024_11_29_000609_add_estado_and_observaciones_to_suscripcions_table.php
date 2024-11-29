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
        Schema::table('suscripcions', function (Blueprint $table) {
            //
            $table->string('estado')->default('activo'); // Valores: activo, suspendido, inactivo
            $table->text('observaciones')->nullable();  // Campo para comentarios u observaciones
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suscripcions', function (Blueprint $table) {
            //
            $table->dropColumn('estado');
            $table->dropColumn('observaciones');
        });
    }
};
