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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', UserController::class);
Route::post('/login', [AuthController::class,'login']);




































































































// Route::post('login', [AuthenticatedSessionController::class, 'store']);
// Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//             ->name('password.email');

// Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//             ->name('password.reset');

// Route::post('reset-password', [NewPasswordController::class, 'store'])
//             ->name('password.store');

// // Route::middleware('auth')->group(function () {
// //     Route::get('verify-email', EmailVerificationPromptController::class)
// //                 ->name('verification.notice');

//     // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//     //             ->middleware(['signed', 'throttle:6,1'])
//     //             ->name('verification.verify');

//     // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//     //             ->middleware('throttle:6,1')
//     //             ->name('verification.send');

//     // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//     //             ->name('password.confirm');

//     // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

//     // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//     //             ->name('logout');

