<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
    	Schema::create('usuarios', function (Blueprint $table) {
        	$table->id('id_usuario');
        	$table->string('nombre', 100);
        	$table->string('email', 100)->unique();
        	$table->timestamp('fecha_registro')->useCurrent();
        	$table->timestamps();  // Si quieres campos created_at y updated_at
    	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
