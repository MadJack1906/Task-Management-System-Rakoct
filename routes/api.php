<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/users'], static function () {
    Route::post('/login', [UserController::class, 'login'])->name('api.users.login');
    Route::post('/register', [UserController::class, 'register'])->name('api.users.register');

    Route::middleware(['auth:api'])->group(function () {
        Route::get('/me', [UserController::class, 'me'])->name('api.users.auth.me');
        Route::post('/logout', [UserController::class, 'logout'])->name('api.users.auth.logout');
        Route::patch('/{user}/profile/update', [UserController::class, 'updateProfile'])->name('api.users.auth.profile.update');
        Route::get('/refresh', [UserController::class, 'refresh'])->name('api.users.auth.refresh');
    });
});
