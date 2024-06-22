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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->unsignedBigInteger('categoria_id');
            $table->string('descripcion');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('stock');
            $table->decimal('precio', 8, 2);
            $table->string('color');
            $table->string('banner_image')->nullable();
            $table->timestamps();
            // Definición de la clave foránea

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
