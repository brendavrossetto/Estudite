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
    Schema::create('materias', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->text('conteudo');
        $table->string('categoria')->nullable();  // Categoria opcional
        $table->string('tags')->nullable();       // Tags para facilitar a pesquisa
        $table->timestamps();
    });
}

};
