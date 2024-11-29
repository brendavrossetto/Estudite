<?php

use App\Http\Controllers\CadastroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::post('/cadastrar', [CadastroController::class, 'store'])->name('gravar');

