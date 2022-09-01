<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Quote;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,'index'])->name('show.main');
Route::get('/quotes/{slug}', [MainController::class,'show'])->name('show.quotes');

Route::get('/change-locale/{locale}', [LanguageController::class,'locale'])->name('locale.change');


Route::get('/add/movie',[MovieController::class,'show'])->middleware('admin')->name('show.add.movie');
Route::post('/add/movie',[MovieController::class,'store'])->middleware('admin')->name('add.movie');


Route::get('/add/quote',[QuoteController::class, 'show'])->middleware('admin')->name('show.add.quote');
Route::post('/add/quote',[QuoteController::class,'store'])->middleware('admin')->name('add.quote');



Route::get('/login',[LoginController::class,'show'])->middleware('guest')->name('show.login');
Route::post('/login',[LoginController::class,'store'])->middleware('guest')->name('store.login');


Route::post('/logout',[LoginController::class,'destroy'])->middleware('admin')->name('logout');

Route::delete('/admin/quotes/{quote}',[QuoteController::class,'destroy'])->middleware('admin')->name('delete.quote');
Route::delete('/admin/movies/{movie}',[MovieController::class,'destroy'])->middleware('admin')->name('delete.movie');


Route::get('/admin/quotes/{quote}/edit',[QuoteController::class,'edit'])->middleware('admin')->name('edit.quote');
Route::patch('/admin/quotes/{quote}',[QuoteController::class,'update'])->middleware('admin')->name('change.quote');

Route::get('/admin/movies/{movie}/edit',[MovieController::class,'edit'])->middleware('admin')->name('edit.movie');
Route::patch('/admin/movies/{movie}',[MovieController::class,'update'])->middleware('admin')->name('update.movie');