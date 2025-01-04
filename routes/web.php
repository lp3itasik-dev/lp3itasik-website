<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramBenefitController;
use App\Http\Controllers\ProgramCompetentionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramInterestController;
use App\Http\Controllers\ProgramMissionController;
use App\Http\Controllers\ProgramPotentionController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/reguler-sore', [WelcomeController::class, 'employee'])->name('employee');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');
Route::get('/ormawa', [WelcomeController::class, 'ormawa'])->name('ormawa');
Route::get('/career-center', [WelcomeController::class, 'career_center'])->name('career-center');
Route::get('/program-studi/{code}', [WelcomeController::class, 'program_studi'])->name('program-studi');
Route::get('/penerimaan-mahasiswa', [WelcomeController::class, 'redirect_link'])->name('redirect-link');

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
    Route::get('programinterests/{id}', [ProgramInterestController::class, 'show'])->name('programinterests.show');
    Route::post('programinterests/store', [ProgramInterestController::class, 'store'])->name('programinterests.store');
    Route::patch('programinterests/update/{id}', [ProgramInterestController::class, 'update'])->name('programinterests.update');
    Route::patch('programinterests/updatestatus/{id}', [ProgramInterestController::class, 'updatestatus'])->name('programinterests.updatestatus');
    Route::delete('programinterests/destroy/{id}/{program_id}', [ProgramInterestController::class, 'destroy'])->name('programinterests.destroy');

    Route::get('programpotentions/create/{id}', [ProgramPotentionController::class, 'create'])->name('programpotentions.create');
    Route::get('programpotentions/edit/{id}', [ProgramPotentionController::class, 'edit'])->name('programpotentions.edit');
    Route::get('programpotentions/{id}', [ProgramPotentionController::class, 'show'])->name('programpotentions.show');
    Route::post('programpotentions/store', [ProgramPotentionController::class, 'store'])->name('programpotentions.store');
    Route::patch('programpotentions/update/{id}', [ProgramPotentionController::class, 'update'])->name('programpotentions.update');
    Route::patch('programpotentions/updatestatus/{id}', [ProgramPotentionController::class, 'updatestatus'])->name('programpotentions.updatestatus');
    Route::delete('programpotentions/destroy/{id}/{program_id}', [ProgramPotentionController::class, 'destroy'])->name('programpotentions.destroy');

    Route::get('programmissions/create/{id}', [ProgramMissionController::class, 'create'])->name('programmissions.create');
    Route::get('programmissions/edit/{id}', [ProgramMissionController::class, 'edit'])->name('programmissions.edit');
    Route::get('programmissions/{id}', [ProgramMissionController::class, 'show'])->name('programmissions.show');
    Route::post('programmissions/store', [ProgramMissionController::class, 'store'])->name('programmissions.store');
    Route::patch('programmissions/update/{id}', [ProgramMissionController::class, 'update'])->name('programmissions.update');
    Route::patch('programmissions/updatestatus/{id}', [ProgramMissionController::class, 'updatestatus'])->name('programmissions.updatestatus');
    Route::delete('programmissions/destroy/{id}/{program_id}', [ProgramMissionController::class, 'destroy'])->name('programmissions.destroy');

    Route::get('programbenefits/create/{id}', [ProgramBenefitController::class, 'create'])->name('programbenefits.create');
    Route::get('programbenefits/edit/{id}', [ProgramBenefitController::class, 'edit'])->name('programbenefits.edit');
    Route::get('programbenefits/{id}', [ProgramBenefitController::class, 'show'])->name('programbenefits.show');
    Route::post('programbenefits/store', [ProgramBenefitController::class, 'store'])->name('programbenefits.store');
    Route::patch('programbenefits/update/{id}', [ProgramBenefitController::class, 'update'])->name('programbenefits.update');
    Route::patch('programbenefits/updatestatus/{id}', [ProgramBenefitController::class, 'updatestatus'])->name('programbenefits.updatestatus');
    Route::delete('programbenefits/destroy/{id}/{program_id}', [ProgramBenefitController::class, 'destroy'])->name('programbenefits.destroy');

    Route::get('programcompetentions/create/{id}', [ProgramCompetentionController::class, 'create'])->name('programcompetentions.create');
    Route::get('programcompetentions/edit/{id}', [ProgramCompetentionController::class, 'edit'])->name('programcompetentions.edit');
    Route::get('programcompetentions/{id}', [ProgramCompetentionController::class, 'show'])->name('programcompetentions.show');
    Route::post('programcompetentions/store', [ProgramCompetentionController::class, 'store'])->name('programcompetentions.store');
    Route::patch('programcompetentions/update/{id}', [ProgramCompetentionController::class, 'update'])->name('programcompetentions.update');
    Route::patch('programcompetentions/updatestatus/{id}', [ProgramCompetentionController::class, 'updatestatus'])->name('programcompetentions.updatestatus');
    Route::delete('programcompetentions/destroy/{id}/{program_id}', [ProgramCompetentionController::class, 'destroy'])->name('programcompetentions.destroy');
});

require __DIR__.'/auth.php';
