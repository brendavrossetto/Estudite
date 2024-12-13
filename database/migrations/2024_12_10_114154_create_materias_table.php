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
        $table->text('categoria');
        $table->text('conteudo');
        $table->text('tags');
        $table->integer('nota');
      
     
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('materias');
}

};
