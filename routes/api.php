<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrutaController;
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

Route::prefix('v1')->group(function () {
    Route::get("/fruta",[FrutaController::class,'List']);
    Route::get("/fruta/{d}",[FrutaController::class,'Find']);
    Route::post("/fruta",[FrutaController::class,'Create']);
    Route::delete("/fruta/{d}",[FrutaController::class,'Delete']);
    Route::put("/fruta/{d}",[FrutaController::class,'Update']);

});

