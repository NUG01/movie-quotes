<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\DB;
use App\Http\Requests\StoreMovieRequest;

class MovieController extends Controller
{


   public function destroy(Movie $movie){
       $movie->delete();
      return redirect('/add/movie')->with('success','Movie has been deleted');
}


   public function show()
   {
      $movies = Movie::all()->unique('name');
     return view('addMovie', ['movies'=>$movies,'forTable'=>Movie::all()]);
     
   }
   



   public function store(StoreMovieRequest $request)
   {

       $attributes= $request->validate([
       'name'=>'required|unique:movies'
   ]);


   Movie::create([
      'name' => $attributes['name'],
  ]);  

   return redirect('/add/movie')->with('success','Movie has been added');
   }

   public function edit(Movie $movie)
{
  
    return view('editMovie',['movie'=>$movie,'movies'=>Movie::all()]);
}

    public function update(Movie $movie){
   //StoreMovieRequest $request
      $attributes= request()->validate([
         'name'=>'required|unique:movies'
        ]);

        
        $movie->update($attributes);
        
        return redirect('/add/movie')->with('success','Movie has been updated!');
   }
}
