<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;
use Illuminate\Support\Facades\Route;

// Redirect root to login if not authenticated
Route::get('/', function () {
    return redirect()->route('login');
});

// Public routes (no authentication required)
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, "loginPost"])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

// Protected routes (authentication required)
Route::middleware('auth')->group(function(){
    // Dashboard/Home page
    Route::get('/dashboard', [TaskManager::class, "listTask"])->name('home');
    
    // Task management routes
    Route::get('/task/add', [TaskManager::class, 'addTask'])->name('task.add');
    Route::post('/task/add', [TaskManager::class, 'addTaskPost'])->name('task.add.post');

    Route::get('/task/update/{id}', [TaskManager::class, 'updateTaskStatus'])->name('task.status.update');
    
    // Logout route
    Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

    //delete task
    Route::get('/task/delete/{id}', [TaskManager::class, 'deleteTask'])->name('task.delete');
});

