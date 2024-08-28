<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\StrengthController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


//Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('home');
});
Route::get('/verify-first', function () {
    
    return view('verify-first');
});
Route::get('/viewnew', function () {
    return view('viewnew');
});
Route::get('/bulk', function () {
    return view('bulk');
});
Route::get('/new-resend', function () {
    return view('new-resend');
});

// Route::get('/confirm', function () {
//     return view('/confirm');
// });

// In web.php
//Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

Route::get('/cvs/{id}', [CvController::class, 'show'])->name('cvs.show');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');

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

Route::get('/new',[EmailController::class,'sendEmail']);
Route::POST('/new',[EmailController::class,'sendEmail']);

Route::get('/resend-new',[EmailController::class,'reSendEmail']);
Route::POST('/resend-new',[EmailController::class,'reSendEmail']);

Route::get('/send-bulk', [EmailController::class, 'sendBulkEmail'])->name('send.bulk');
Route::POST('/send-bulk', [EmailController::class, 'sendBulkEmail'])->name('send.bulk');


Route::get('/confirm', [VerificationController::class, 'confirmEmail']);

// Route::get('/new', [LogoutController::class, 'autoLogout'])->name('logout.and.redirect');

Route::get('/simple', function () {
    return "simple route works";
});


Route::group(['middleware' => ['auth']], function () {

    // Route::get('/create-cv', [CvController::class, 'create']);
    // Route::post('/customize-cv', [CvController::class, 'customize']);

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/create-cv', [CvController::class, 'store'])->name('cv.store');

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

    Route::get('/cv-view', [CvController::class, 'showCvWithImage'])->name('cv.view');
    Route::get('/img-download-cv-pdf', [CvController::class, 'imgDownloadCvPdf'])->name('img-download-cv-pdf');

    Route::get('/show-cv', [PdfController::class, 'showCv'])->name('show-cv');
    Route::get('/download-cv-pdf', [PdfController::class, 'downloadCvPdf'])->name('download-cv-pdf');

    Route::get('/show-cv-purple', [PdfController::class, 'showCvPurple'])->name('show-cv-purple');
    Route::get('/download-cv-pdf-purple', [PdfController::class, 'downloadCvPdfPurple'])->name('download-cv-pdf-purple');


    Route::get('/show-cv-orange', [PdfController::class, 'showCvOrange'])->name('show-cv-orange');
    Route::get('/download-cv-pdf-orange', [PdfController::class, 'downloadCvPdfOrange'])->name('download-cv-pdf-orange');


    Route::get('/show-cv-black', [PdfController::class, 'showCvBlack'])->name('show-cv-black');
    Route::get('/download-cv-pdf-black', [PdfController::class, 'downloadCvPdfBlack'])->name('download-cv-pdf-black');

    Route::get('/show-cv-green', [PdfController::class, 'showCvGreen'])->name('show-cv-green');
    Route::get('/download-cv-pdf-green', [PdfController::class, 'downloadCvPdfGreen'])->name('download-cv-pdf-green');
});








