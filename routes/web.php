<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
})->name('home');


Route::get('login', [UserController::class, 'login']);

Route::get('roles', [RoleController::class, 'index']);
Route::post('create-role', [RoleController::class, 'CreateRole']);
Route::group(['middleware' => ['auth']], function(){
    
    
    Route::get('role/{key_name}', [RoleController::class, 'findRole']);
   
    Route::get('update-role/{id}', [RoleController::class, 'UpdateRole']);
    Route::get('update-role-k/{key_name}', [RoleController::class, 'UpdateRolebyKeyName']);
    Route::get('delete-role/{key_name}', [RoleController::class, 'DeleteRole']);
    Route::get('rol-pivote', [RoleController::class, 'indexPivot']);
    
    /* USUARIOS */      
    Route::get('usuarios',[UserController::class, 'index']);
    Route::get('crear-user',[UserController::class, 'create']);
    
    
    Route::get('permission', [PermissionController::class, 'index']);
    Route::get('permission/{key_name}', [PermissionController::class, 'findpermission']);
    Route::get('create-permission', [PermissionController::class, 'CreatePermission']);
    Route::get('update-permission/{id}', [PermissionController::class, 'UpdatePermission']);
    Route::get('update-permission-k/{key_name}', [PermissionController::class, 'UpdatePermissionyKeyName']);
    Route::get('delete-permission/{key_name}', [PermissionController::class, 'DeletePermission']);
});


