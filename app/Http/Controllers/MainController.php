<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Movie;

class MainController extends Controller
{
    public function index()
    {

    if(Movie::all()->count()){
		return view('main', ['movies'=>Quote::all()->random()]);
	}else{
		return 'Database is empty :)';
	}
   }
   public function show($slug){
        return view('movies', ['movies'=>Movie::all(), 'slug'=>$slug]);
   }
}
