<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;

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
	// return view('main',['movies'=>Movie::inRandomOrder()->get()]);
	$quantity = Movie::count();
	return view('main', ['movies'=>Movie::all()->random()]);
});
Route::get('quotes/{slug}', function ($slug) {
	// dd($slug);
	return view('movies', ['movies'=>Movie::all(), 'slug'=>$slug]);
});




Route::get('add/movie',[MovieController::class,'show']);
Route::post('add/movie',[MovieController::class,'store']);
Route::post('add/movie',[QuoteController::class,'store']);


Route::get('login',[LoginController::class,'create'])->middleware('guest');
Route::post('login',[LoginController::class,'store'])->middleware('guest');


Route::post('logout',[LoginController::class,'destroy'])->middleware('auth');


