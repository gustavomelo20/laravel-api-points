<?php


use App\Http\Controllers\{
    PointsController, 
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::post('/points/receber/{cpf}', [PointsController::class, 'getPoint'])->name('points.create');
Route::post('/points/enviar/{cpf}', [PointsController::class,  'sendPoint'])->name('points.store');
Route::get('/points/{cpf}', [PointsController::class,  'showPoints'])->name('points.show');

