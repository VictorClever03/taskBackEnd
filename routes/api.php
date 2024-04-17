<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskModelController;
use App\Http\Controllers\UserController;

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


Route::post('/tasks', [TaskModelController::class, 'store']);
Route::get('/task', [TaskModelController::class, 'index']);
Route::get('/task/{id}', [TaskModelController::class, 'show']);
Route::delete('/task/{id}', [TaskModelController::class, 'destroy']);
Route::put('/task/update/{id}', [TaskModelController::class, 'update']);
Route::any('/task/search', [TaskModelController::class, 'search']);



Route::resource('users', UserController::class);
Route::post('/login', [AuthController::class,'login']);





































































































