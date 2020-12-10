<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing/landing');
});

Route::get('/dashboards', [DashboardController::class, 'index'])->middleware('auth:sanctum')->name('dashboard.index');
Route::get('/dashboards/leaderboard', [DashboardController::class, 'leaderboard'])->middleware('auth:sanctum')->name('dashboard.leaderboard');
Route::get('/dashboards/match/create', [MatchController::class, 'create'])->middleware('auth:sanctum')->name('match.create');
Route::post('/dashboards/match/store', [MatchController::class, 'store'])->middleware('auth:sanctum')->name('match.store');
Route::get('/dashboards/match/success', [MatchController::class, 'success'])->middleware('auth:sanctum')->name('match.success');
Route::get('/dashboards/statistics', [DashboardController::class, 'statistics'])->middleware('auth:sanctum')->name('dashboard.statistics');
