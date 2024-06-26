<?php

use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TecnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// rotte pubbliche (guest)
Route::get('/', [PageController::class, 'index'])->name('home');

// rotte private (admin)
Route::middleware(['auth', 'verified'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function(){
            Route::get('/', [DashboardController::class, 'index'])->name('home');
            // rotte crud Project
            Route::resource('projects', ProjectController::class);
            Route::resource('tecnologies', TecnologyController::class)->except('create', 'show','edit');
            Route::resource('types', TypeController::class)->except('create','show', 'edit');


            Route::get('type-projects', [TypeController::class, 'typeProjects'] )->name('type-projects');
            Route::get('orderby/{direction}/{column}', [ProjectController::class, 'orderBy'] )->name('orderby');
        });



// rotte autenticazione (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
