<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlannerController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PlannerController::class)->group(function() {
    Route::get('/planer', 'planner')->middleware(['auth', 'verified'])->name('planner');
    Route::post('/dodaj-wydatek', 'expenseStore')->middleware(['auth', 'verified'])->name('planner.expense.store');
    Route::post('/dodaj-wplyw', 'earningStore')->middleware(['auth', 'verified'])->name('planner.earning.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
