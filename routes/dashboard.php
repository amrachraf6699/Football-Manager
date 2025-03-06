<?php

use App\Http\Controllers\Dashboard\BlogsController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\PlayersController;
use App\Http\Controllers\Dashboard\PositionsController;
use App\Http\Controllers\Dashboard\ProfileController;
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

//Profile Routes
Route::controller(ProfileController::class)->as('profile.')->group(function(){
    Route::get('logout' , 'logout')->name('logout');
    Route::get('profile' , 'index')->name('index');
});

//Settings Routes
Route::get('settings' , [SettingsController::class , 'index'])->name('settings.index');
Route::post('settings' , [SettingsController::class , 'store'])->name('settings.store');


//Trainings Routes
Route::resource('trainings' , TrainingsController::class)->middleware('role:coach');

//Positions Routes
Route::resource('positions' , PositionsController::class)->middleware('role:coach');

//Pages Routes
Route::resource('pages' , PagesController::class)->middleware('role:coach');

//Blogs Routes
Route::resource('blogs' , BlogsController::class)->middleware('role:coach');

//Players Routes
Route::resource('players' , PlayersController::class)->middleware('role:coach');