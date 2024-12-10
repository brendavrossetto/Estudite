<?php


use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');

//criar nossa rota

////////////////////////////////////////////////////////////////////

Route::prefix('usuarios')->middleware('auth')->group(function() { 
Route::get('/', [UsuariosController::class, 'index'])
->name('usuarios');

Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios.cadastrar');

Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios.gravar');

Route::get('/apagar/{usuario}', 
[UsuariosController::class, 'apagar'])->name('usuarios.apagar');
});

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');