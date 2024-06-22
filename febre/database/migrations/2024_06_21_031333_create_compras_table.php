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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comprador_id')->constrained()->onDelete('cascade');
            $table->foreignId('pago_id')->constrained();
            $table->string('producto');
            $table->decimal('precio', 8, 2);
            $table->integer('cantidad');
            $table->dateTime('fecha')->default(now()); // Agregar campo de fecha con valor por defecto
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
