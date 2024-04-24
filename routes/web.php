<?php

use App\Livewire\TaskDetailComponent;
use App\Livewire\TaskListComponent;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks', TaskListComponent::class)->name('tasks.lists');
    Route::get('/tasks/{task}', TaskDetailComponent::class)->name('tasks.detail');
});

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
