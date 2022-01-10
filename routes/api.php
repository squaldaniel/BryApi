<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource("empresas", "App\Http\Controllers\EmpresaController");

Route::resource("funcionarios", "App\Http\Controllers\FuncionarioController");

Route::resource("clientes", "App\Http\Controllers\ClienteController");


