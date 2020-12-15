<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TarefasController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/tarefas')->group(function(){
    Route::get('/', [TarefasController::class, 'list']); //Listar as tarefas

    Route::get('add', [TarefasController::class, 'add']); //Tela de adição de nova tarefa
    Route::post('add', [TarefasController::class, 'addAction']); //Ação de adicionar tarefa

    Route::get('edit/{id}', [TarefasController::class, 'edit']); // Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); //Ação de editar tarefa

    Route::get('delete/{id}', [TarefasController::class, 'del']); //Acção de deleção  de tarefa

    Route::get('marcar/{id}', [TarefasController::class, 'done']); //Marcar como resolvido
});
