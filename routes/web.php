<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Quote;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;

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

Route::get('/', [MainPageController::class,'index'])->name('show.main');
Route::get('/quotes/{slug}', [MainPageController::class,'show'])->name('show.quotes');

Route::get('/change-locale/{locale}', [LanguageController::class,'locale'])->name('locale.change');

Route::group(['middleware' => ['guest']], function () {
	Route::get('/login',[LoginController::class,'show'])->name('show.login');
	Route::post('/login',[LoginController::class,'store'])->name('store.login');
});

Route::group(['middleware' => ['admin']], function () {
	Route::get('/add/movie',[MovieController::class,'show'])->name('show.movie');
	Route::post('/add/movie',[MovieController::class,'store'])->name('add.movie');
	
	Route::get('/add/quote',[QuoteController::class, 'show'])->name('show.add.quote');
	Route::post('/add/quote',[QuoteController::class,'store'])->name('add.quote');
	
	Route::delete('/admin/quotes/{quote}',[QuoteController::class,'destroy'])->name('delete.quote');
	Route::get('/admin/quotes/{quote}/edit',[QuoteController::class,'edit'])->name('edit.quote');
	Route::patch('/admin/quotes/{quote}',[QuoteController::class,'update'])->name('change.quote');
	
	
	Route::delete('/admin/movies/{movie}',[MovieController::class,'destroy'])->name('delete.movie');             
	Route::get('/admin/movies/{movie}/edit',[MovieController::class,'edit'])->name('edit.movie');
	Route::patch('/admin/movies/{movie}',[MovieController::class,'update'])->name('update.movie');
	
	Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
});









         




