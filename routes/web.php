<?php

use App\Http\Controllers\ProducController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProducController::class, "index"])->name("index");
Route::get('/edit/{id}', [ProducController::class, "edit"])->name("edit");
Route::post('/save_update/{id}', [ProducController::class, "store"])->name("store");
Route::delete('/delete', [ProducController::class, "destroy"])->name("delete");
Route::get('/create', [ProducController::class, "create"])->name("create");
Route::post('/save_new', [ProducController::class, "store"])->name("store");
