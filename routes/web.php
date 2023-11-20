<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\fecthSkinsController;
use App\Http\Controllers\PagesController;
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

Route::get('/',[PagesController::class, 'index']);


Route::get('/fetchdata', [fecthSkinsController::class, 'fetchData']);
Route::get('/create-case', [PagesController::class, 'createCase']);
Route::post('/create-case', [BoxController::class, 'createBox']);
Route::get('/case/{id}', [BoxController::class, 'showBox']);

