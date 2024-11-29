<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

// Rota para exibir o formulário
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

// Rota para armazenar o cadastro (POST)
Route::post('/cadastrar', [CadastroController::class, 'store'])->name('cadastro.store');

// Rota inicial, pode redirecionar ou exibir uma view básica
Route::get('/', function () {
    return view('index');
});
