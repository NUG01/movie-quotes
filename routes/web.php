<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Models\Quote;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class,'show']);
Route::get('quotes/{slug}', [MainController::class,'showQuotes']);


// Route::get('/choose',function(){
// 	return view('choose');
// });

Route::get('add/movie',[MovieController::class,'show']);
Route::post('add/movie',[MovieController::class,'store']);


Route::post('add/quote',[QuoteController::class,'store']);
Route::get('add/quote',[QuoteController::class, 'show']);


Route::get('login',[LoginController::class,'create'])->middleware('guest');
Route::post('login',[LoginController::class,'store'])->middleware('guest');


Route::post('logout',[LoginController::class,'destroy'])->middleware('auth');

Route::delete('admin/quotes/{quote}',[QuoteController::class,'destroy'])->middleware('auth');
Route::delete('admin/movies/{movie}',[MovieController::class,'destroy'])->middleware('auth');


Route::get('admin/quotes/{quote}/edit',[QuoteController::class,'edit'])->middleware('auth');
Route::patch('admin/quotes/{quote}',[QuoteController::class,'update'])->middleware('auth');

Route::get('admin/movies/{movie}/edit',[MovieController::class,'edit'])->middleware('auth');
Route::patch('admin/movies/{movie}',[MovieController::class,'update'])->middleware('auth');