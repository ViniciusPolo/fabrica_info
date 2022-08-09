<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\CursosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('cursos', [CursosController::class, 'index']);
Route::post('cursos/novo', [CursosController::class, 'store']);
Route::get('cursos/{id}', [CursosController::class, 'show']);
Route::put('cursos/editar/{id}', [CursosController::class, 'update']);
Route::delete('cursos/apagar/{id}', [CursosController::class, 'destroy']);


Route::get('alunos', [AlunosController::class, 'index']);
Route::get('alunos/descricao', [AlunosController::class, 'indexJoin']);
Route::post('alunos/novo', [AlunosController::class, 'store']);
Route::get('alunos/{id}', [AlunosController::class, 'show']);
Route::put('alunos/editar/{id}', [AlunosController::class, 'update']);
Route::delete('alunos/apagar/{id}', [AlunosController::class, 'destroy']);