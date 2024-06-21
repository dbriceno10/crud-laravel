<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', function () {
    return view('welcome');
});

//Controlador de recursos con rutas integradas, resources ya hace referencia a un crud por lo que integra los verbos del protocolo HTTP
Route::resource('/tasks', TaskController::class);
// Route::get('/tasks', [TaskController::class, 'index']);

//Comando php artisan route:list ---> lista todas las rutas en nuestra app
