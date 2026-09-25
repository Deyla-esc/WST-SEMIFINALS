<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Redirect homepage directly to tasks page
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Resource routes for CRUD operations
Route::resource('tasks', TaskController::class);

// Custom route for quick status updates
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');