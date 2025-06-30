<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('libros', function (Blueprint $table) {
        $table->id('id_libro');
        $table->string('titulo', 200);
        $table->string('autor', 100);
        $table->date('fecha_publicacion')->nullable();
        $table->string('genero', 50)->nullable();
        $table->boolean('disponible')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
