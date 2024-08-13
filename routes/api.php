<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HappinessController;
use App\Http\Controllers\HappinessResponseController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
use App\Http\Controllers\TicketCategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TipsCategoryController;
use App\Http\Controllers\TipsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('happiness/{factoryId}', [HappinessController::class, 'getDataById']);
Route::resource('happiness', HappinessController::class);

Route::get('notice/{factoryId}', [NoticeController::class, 'getDataById']);
Route::resource('notice', NoticeController::class);

Route::resource('questions', QuestionController::class);

Route::get('survey/{factoryId}', [SurveyController::class, 'getDataById']);
Route::resource('survey', SurveyController::class);

Route::resource('ticketCategory', TicketCategoryController::class);

Route::get('tickets/{factoryId}', [TicketController::class, 'getDataById']);
Route::resource('tickets', TicketController::class);

Route::resource('tipsCategory', TipsCategoryController::class);

Route::get('tips/{factoryId}', [TipsController::class, 'getDataById']);
Route::resource('tips', TipsController::class);

Route::resource('happinessResponse', HappinessResponseController::class);
Route::resource('surveyResponse', SurveyResponseController::class);

Route::get('surveyResponse/userId/${userId}/surveyId/${surveyId}', [SurveyResponseController::class, 'getResponsesByUser']); 

Route::post('register', [AuthController::class, 'register']); 
Route::post('login', [AuthController::class, 'login']);
