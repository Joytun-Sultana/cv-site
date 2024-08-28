<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Route::group(['middleware' => ['auth']], function () {
//    Route::get('/fill-skills', [SkillController::class, 'fillSkills']);
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/fill-skills', [SkillController::class, 'fillSkills']);
});


