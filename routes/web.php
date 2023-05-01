<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::resource('registro', RegistroController::class, ['except' => ['index']]);
//Route::resource('usuario', UsuarioController::class, ['except' => ['update','destroy', 'show', 'edit']]);

Route::get('/', [UsuarioController::class, 'index']);
//Inserir action para autenticação de usuário
Route::get('/cadastrar', [UsuarioController::class, 'create']);
Route::post('/cadastrar.store', [UsuarioController::class, 'store']);


Route::get('/formulario', [RegistroController::class, 'create']);
Route::post('/formulario.store', [RegistroController::class, 'store'])->name('enviar'); 
Route::get('/editar/{id?}', [RegistroController::class, 'edit']); 
Route::post('/atualizar/{id?}', [RegistroController::class, 'update'])->name('atualizaProduto');
Route::get('/curriculos', [RegistroController::class, 'show'])->name('curriculos');
Route::get('/deletar/{id?}', [RegistroController::class, 'destroy']);

//Falta inserir: update, destroy

