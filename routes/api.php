<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Wdsl\SoapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/getAll', [ProductController::class, "index"])->name("index");
Route::put('/edit/{id}', [ProductController::class, "store"])->name("edit");
Route::post('/create', [ProductController::class, "store"])->name("create");
Route::delete('/delete', [ProductController::class, "destroy"])->name("delete");

Route::get('/soap/wsdl', [SoapController::class, "index"])->name('soap-wsdl');
