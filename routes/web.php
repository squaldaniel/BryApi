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

Route::get('/', function () {
    return view('bootstrap.index');
});

Route::get('/comandofull', function(){
    shell_exec('sudo php artisan config:clear');
    shell_exec('sudo php artisan config:cache');
    shell_exec('sudo php artisan view:clear');
    shell_exec('sudo php artisan view:clear');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

# Rotas crud para o Blader
Route::get("/crud", [App\Http\Controllers\CrudController::class, "index"]);
# totas para listar
Route::get("/crudempresas", [App\Http\Controllers\CrudController::class, "empresaslist"]);
Route::get("/crudfuncionarios", [App\Http\Controllers\CrudController::class, "funcionarioslist"]);
Route::get("/crudclientes", [App\Http\Controllers\CrudController::class, "clienteslist"]);

Route::get("/action/{btn}/{id?}/{model?}", function($btn, $id=null, $model=null){
    $userAction = new App\Http\Controllers\CrudController;
    isset($id) ? $id : $id = null;
    return $userAction->actionModel($btn, $id, $model);
});
Route::post("/update/{model}/{id}", function($model, $id){
    $update = new App\Http\Controllers\CrudController;
    return $update->updateModel($model, $id);
});
Route::post("/criar/{model}", [App\Http\Controllers\CrudController::class, "criarModel"]);


