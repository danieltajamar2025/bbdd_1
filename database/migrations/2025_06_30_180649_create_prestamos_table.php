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
    Schema::create('prestamos', function (Blueprint $table) {
        $table->id('id_prestamo');
        $table->unsignedBigInteger('usuario_id');
        $table->unsignedBigInteger('libro_id');
        $table->timestamp('fecha_prestamo')->useCurrent();
        $table->date('fecha_devolucion')->nullable();

        $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        $table->foreign('libro_id')->references('id_libro')->on('libros')->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
