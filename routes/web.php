<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('inicial');
// })->name('index');

// //criar nossa rota

// Route::get('/usuarios',
// [  UsuariosControllerController::class, 'index'])->name
// ('usuarios');
// //qnd acessar a rota via get anamisas ele vai pegar  a função classe controler e executar o index, rota index dos nimais se chama anmiais

// Route::get('/usuarios/cadastrar',
// [UsuariosController::class, 'cadastrar'])->name
// ('usuarios.cadastrar');
// //nome da rota p criar o link, vai p CADASTRAT

// Route::post('/usuarios.cadastrar',
// [UsuariosController::class, 'gravar'])->name
// ('usuarios.gravar');
// //VAI PRO GRAVAR (QUE AINDA NN EXISTE)

// Route::get('/usuarios/apagar/{usuario}', 
// [UsuariosController::class,'apagar']) -> name('usuarios.apagar');

////////////////////////////////////////////////////////////////////

Route::prefix('usuarios')->middleware('auth')->group(function() { 
Route::get('/', [UsuarioController::class, 'index'])
->name('usuario');

// Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios.cadastrar');

// Route::post('/cadastrar', [UsuariosController::class, 'gravar'])->name('usuarios.gravar');

Route::get('/apagar/{usuario}', 
[UsuarioController::class, 'apagar'])->name('usuario.apagar');
});

Route::get('login', [UsuarioController::class, 'login'])->name('login');

Route::post('login', [UsuarioController::class, 'login']);

Route::get('logout', [UsuarioController::class, 'logout'])->name('logout');