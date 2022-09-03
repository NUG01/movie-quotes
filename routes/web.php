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

Route::get('/change-locale/{locale}', [LanguageController::class,'locale'])->name('locale.change');

Route::controller(MainPageController::class)->group(function () {
	Route::get('/','index')->name('show.main');
	Route::get('/quotes/{slug}','show')->name('show.quotes');

});

Route::group(['middleware' => ['guest']], function () {
	Route::get('/login',[LoginController::class,'show'])->name('show.login');
	Route::post('/login',[LoginController::class,'store'])->name('store.login');
});

Route::group(['middleware' => ['admin']], function () {
	Route::controller(MovieController::class)->group(function () {
		Route::get('/add/movie','show')->name('show.movie');
		Route::post('/add/movie','store')->name('add.movie');
		Route::delete('/admin/movies/{movie}','destroy')->name('delete.movie');             
		Route::get('/admin/movies/{movie}/edit','edit')->name('edit.movie');
		Route::patch('/admin/movies/{movie}','update')->name('update.movie');
		
});
	Route::controller(QuoteController::class)->group(function () {
		Route::get('/add/quote','show')->name('show.add.quote');
		Route::post('/add/quote','store')->name('add.quote');
		Route::delete('/admin/quotes/{quote}','destroy')->name('delete.quote');
		Route::get('/admin/quotes/{quote}/edit','edit')->name('edit.quote');
		Route::patch('/admin/quotes/{quote}','update')->name('change.quote');
	
		
});
    Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
});









         




