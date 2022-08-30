<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\DB;

class MovieController extends Controller
{


   public function destroy(Movie $movie){
      $movie->delete();
      return redirect('/add/movie')->with('success','Movie has been deleted');
}


   public function show()
   {
      $unique = Movie::all()->unique('name');
      
     
      return view('addMovie', ['movies'=>$unique,'forTable'=>Movie::all()]);
   }
   



   public function store()
   {

  $attributes= request()->validate([
    'name'=>'required|unique:movies'
   ]);


   // Movie::create($attributes);

   Movie::create([
      'name' => $attributes['name'],
  ]);  

   // session()->flash('success','Movie has been added.');
   return redirect('/add/movie')->with('success','Movie has been added');
   }



   public function delete()
   {
    return view('add');
   }
}
