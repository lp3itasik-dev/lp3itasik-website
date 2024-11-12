<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramInterestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('programs', ProgramController::class);
    Route::patch('programs/updatestatus/{id}', [ProgramController::class, 'updatestatus'])->name('programs.updatestatus');
    Route::get('programinterests/create/{id}', [ProgramInterestController::class, 'create'])->name('programinterests.create');
    Route::get('programinterests/edit/{id}', [ProgramInterestController::class, 'edit'])->name('programinterests.edit');
    Route::post('programinterests/store', [ProgramInterestController::class, 'store'])->name('programinterests.store');
    Route::patch('programinterests/update/{id}', [ProgramInterestController::class, 'update'])->name('programinterests.update');
    Route::patch('programinterests/updatestatus/{id}', [ProgramInterestController::class, 'updatestatus'])->name('programinterests.updatestatus');
    Route::delete('programinterests/destroy/{id}/{program_id}', [ProgramInterestController::class, 'destroy'])->name('programinterests.destroy');
});

require __DIR__.'/auth.php';
