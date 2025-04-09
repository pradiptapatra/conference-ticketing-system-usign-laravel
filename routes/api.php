<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\IdentityCardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/conferences', [ConferenceController::class, 'index']);
    Route::post('/conferences', [ConferenceController::class, 'store']);
    Route::post('/halls', [HallController::class, 'store']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::get('/sessions', [SessionController::class, 'index']);
    Route::post('/sessions/{id}/book', [BookingController::class, 'book']);
    Route::delete('/tickets/{ticket}', [BookingController::class, 'cancel']);
    Route::get('/tickets/{ticket}/identity-card', [IdentityCardController::class, 'generate']);

    Route::get('/check-in/{ticket}', function ($ticket) {
        return "Check-in for ticket $ticket";
    })->name('check-in');
});