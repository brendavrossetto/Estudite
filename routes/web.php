<?php


use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');

Route::get('/login', [UsuariosController::class, 'login']);

Route::get('/materias', [MateriasController::class, 'index'])->name('materias');;
//qnd acessar a rota via get anamisas ele vai pegar  a função classe controler e executar o index, rota index dos nimais se chama anmiais

Route::get('/materias/cadastrar',
[MateriasController::class, 'cadastrar'])->name
('materias.cadastrar');
//nome da rota p criar o link, vai p CADASTRAT

Route::post('/materias.cadastrar',
[MateriasController::class, 'gravar'])->name
('materias.gravar');
//VAI PRO GRAVAR (QUE AINDA NN EXISTE)

Route::get('/materias/apagar/{materia}', 
[MateriasController::class,'apagar']) -> name('materias.apagar');

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