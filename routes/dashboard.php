<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\PositionsController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\TrainingsController;
use App\Models\Page;
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

Route::get('' , HomeController::class)->name('home');

//Settings Routes
Route::get('settings' , [SettingsController::class , 'index'])->name('settings.index');
Route::post('settings' , [SettingsController::class , 'store'])->name('settings.store');


//Trainings Routes
Route::resource('trainings' , TrainingsController::class)->middleware('role:coach');

//Positions Routes
Route::resource('positions' , PositionsController::class)->middleware('role:coach');

//Pages Routes
Route::resource('pages' , PagesController::class)->middleware('role:coach');