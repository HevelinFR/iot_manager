<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\AlunosTurmasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\Painel;
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

Route::get('/', function(){
    return view('painel.login');
});

Route::get('/home', [Painel::class, 'index'])->middleware('auth');

// Alunos
Route::get('/alunos', [AlunosController::class, 'index'])->middleware('auth');
Route::post('/adicionar-aluno', [AlunosController::class, 'store'])->middleware('admin');
Route::get('/alunos/edit/{id}', [AlunosController::class, 'edit'])->middleware('admin');
Route::put('/alunos/update/{id}', [AlunosController::class, 'update'])->middleware('admin');
Route::delete('/alunos/{id}', [AlunosController::class, 'destroy'])->middleware('admin');
Route::get('/adicionar-aluno', function(){
    return view('painel.addAluno');
})->middleware('admin');

//Notas
Route::get('/notas/{id_turma}/{id_aluno}', [NotasController::class, 'edit'])->middleware('auth');
Route::get('/boletim', [NotasController::class, 'index'])->middleware('auth');
Route::put('/notas/update/{id}', [NotasController::class, 'update'])->middleware('auth');
Route::post('/notas/adicionar_nota/{id_turma}/{id_aluno}', [NotasController::class, 'store'])->middleware('auth');


//Disciplina
Route::get('/disciplina', [DisciplinaController::class, 'index'])->middleware('auth');
Route::post('/adicionar-disciplina', [DisciplinaController::class, 'store'])->middleware('admin');
Route::get('/disciplina/edit/{id}', [DisciplinaController::class, 'edit'])->middleware('admin');
Route::put('/disciplina/update/{id}', [DisciplinaController::class, 'update'])->middleware('admin');
Route::delete('/disciplina/{id}', [DisciplinaController::class, 'destroy'])->middleware('admin');

Route::get('/disciplina/adicionar', function(){
    return view('painel.addDisciplina');
})->middleware('admin');


//Professes
Route::get('/professor', [ProfessoresController::class, 'index'])->middleware('auth');
Route::post('/adicionar-professor', [ProfessoresController::class, 'store'])->middleware('admin');
Route::get('/professor/edit/{id}', [ProfessoresController::class, 'edit'])->middleware('admin');
Route::put('/professor/update/{id}', [ProfessoresController::class, 'update'])->middleware('admin');
Route::delete('/professor/{id}', [ProfessoresController::class, 'destroy'])->middleware('admin');


Route::get('/adicionar-professor', function(){
    return view('painel.addProfessor');
})->middleware('admin');




//Turmas
Route::get('/turmas', [TurmasController::class, 'index'])->middleware('auth');

Route::get('/adicionar-turma',  [TurmasController::class, 'redir_registration'])->middleware('auth');
Route::post('/adicionar-turma',  [TurmasController::class, 'store'])->middleware('auth');

Route::get('/turma/edit/{id}', [TurmasController::class, 'edit'])->middleware('auth');
Route::get('/turma/alunos/{id}', [TurmasController::class, 'list_alunos'])->middleware('auth');
Route::put('/turma/update/{id}', [TurmasController::class, 'update'])->middleware('auth');
Route::delete('/turma/{id}', [TurmasController::class, 'destroy'])->middleware('auth');

Route::get('/matricula', [AlunosTurmasController::class, 'index'])->middleware('auth');
Route::post('/matricula',  [AlunosTurmasController::class, 'store'])->middleware('auth');

require __DIR__.'/auth.php';