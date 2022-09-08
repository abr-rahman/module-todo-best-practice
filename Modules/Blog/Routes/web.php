<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\TaskController;

Route::prefix('blog')->group(function() {
    Route::get('/', 'BlogController@index');
});

Route::post('/task/store', [TaskController::class, 'taskStore'])->name('task.store');
Route::get('/inactive/status/{id}', [TaskController::class, 'inactiveStatus'])->name('inactive.status');
Route::get('/active/status/{id}', [TaskController::class, 'activeStatus'])->name('active.status');
Route::get('/pending/status/{id}', [TaskController::class, 'pendingStatus'])->name('pending.status');
Route::get('/task/delete/{id}', [TaskController::class, 'taskDelete'])->name('task.delete');
Route::get('/task/force/delete/{id}', [TaskController::class, 'forceDelete'])->name('forcedelete');
Route::get('/task/restore/{id}', [TaskController::class, 'taskRestore'])->name('restore');
Route::get('/all/restore', [TaskController::class, 'restoreAll'])->name('all.restore');
Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/update/{id}', [TaskController::class, 'update'])->name('task.update');
Route::get('/all/deleted', [TaskController::class, 'forceDeleteAll'])->name('forcedelete_all');
// Route::controller(TaskController::class)->group(function(){
//     Route::post('store', 'store');
// });


