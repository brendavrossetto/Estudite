<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

// Rotas de usuários agrupadas com prefixo e middleware
Route::prefix('usuarios')->middleware('auth')->group(function () {
    Route::get('/', [CadastroController::class, 'index'])->name('usuarios.index'); // Exibe a lista de usuários
    Route::get('/cadastrar', [CadastroController::class, 'create'])->name('usuarios.cadastrar'); // Exibe o formulário de cadastro
    Route::post('/cadastrar', [CadastroController::class, 'store'])->name('usuarios.gravar'); // Salva os dados
    Route::get('/apagar/{usuario}', [CadastroController::class, 'destroy'])->name('usuarios.apagar'); // Apaga um usuário
});

// Rotas para autenticação
Route::get('login', [CadastroController::class, 'login'])->name('login'); // Exibe o formulário de login
Route::post('login', [CadastroController::class, 'authenticate'])->name('login.authenticate'); // Processa o login
Route::get('logout', [CadastroController::class, 'logout'])->name('logout'); // Faz logout
