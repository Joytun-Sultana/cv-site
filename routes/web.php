<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\StrengthController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Auth::routes();
//Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





Route::group(['middleware' => 'auth'], function () {
    Route::get('/create-cv', [CvController::class, 'create']);
    Route::post('/customize-cv', [CvController::class, 'customize']);

    Route::get('/fill-personal-details', [PersonalController::class, 'fillPersonalDetails'])->name('fill-personal-details');
    Route::post('/save-personal-details', [PersonalController::class, 'savePersonalDetails'])->name('save-personal-details');

    Route::get('/fill-strengths', [StrengthController::class, 'fillStrengths'])->name('fill-strengths');
    Route::post('/save-strengths', [StrengthController::class, 'saveStrengths'])->name('save-strengths');

    Route::get('/fill-skills', [SkillController::class, 'fillSkills'])->name('fill-skills');
    Route::post('/save-skills', [SkillController::class, 'saveSkills'])->name('save-skills');

    Route::get('/fill-education', [EducationController::class, 'fillEducation'])->name('fill-education');
    Route::post('/save-education', [EducationController::class, 'saveEducation'])->name('save-education');

    Route::get('/fill-experience', [ExperienceController::class, 'fillExperience'])->name('fill-experience');
    Route::post('/save-experience', [ExperienceController::class, 'saveExperience'])->name('save-experience');

    Route::get('/fill-project', [ProjectController::class, 'fillProject'])->name('fill-project');
    Route::post('/save-project', [ProjectController::class, 'saveProject'])->name('save-project');

    // // PDF GENERATING ROUTE

    Route::get('/show-cv', [PdfController::class, 'showCv'])->name('show-cv');
    Route::get('/download-cv-pdf', [PdfController::class, 'downloadCvPdf'])->name('download-cv-pdf');

    Route::get('/show-cv-purple', [PdfController::class, 'showCvPurple'])->name('show-cv-purple');
    Route::get('/download-cv-pdf-purple', [PdfController::class, 'downloadCvPdfPurple'])->name('download-cv-pdf-purple');


    Route::get('/show-cv-orange', [PdfController::class, 'showCvOrange'])->name('show-cv-orange');
    Route::get('/download-cv-pdf-orange', [PdfController::class, 'downloadCvPdfOrange'])->name('download-cv-pdf-orange');


    Route::get('/show-cv-black', [PdfController::class, 'showCvBlack'])->name('show-cv-black');
    Route::get('/download-cv-pdf-black', [PdfController::class, 'downloadCvPdfBlack'])->name('download-cv-pdf-black');

});







