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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla users
            $table->string('photo_front_page')->nullable(); // URL o nombre de archivo de la foto
            $table->string('phone_number', 15); // Número de teléfono
            $table->string('number_document')->unique(); // Documento único
            $table->string('city'); // Ciudad
            $table->string('address'); // Dirección
            $table->string('number_home')->nullable(); // Número de casa (opcional)
            $table->decimal('latitude', 10, 7)->nullable(); // Latitud
            $table->decimal('longitude', 10, 7)->nullable(); // Longitud
            $table->timestamps(); // Created at y Updated at
            $table->softDeletes();

            // Agregar la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
