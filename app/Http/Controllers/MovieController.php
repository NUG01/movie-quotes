<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\DB;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class MovieController extends Controller
{


   public function destroy(Movie $movie): RedirectResponse
   {
       $movie->delete();
      return redirect('/add/movie')->with('success','Movie has been deleted');
   }
   
   public function show(): View
   {
         
         $movies = Movie::all()->unique('name');
         return view('addMovie', ['movies'=>$movies,'forTable'=>Movie::all()]);
      }
      
   
   
   

   public function store(StoreMovieRequest $request): RedirectResponse
   {

      $movie=new Movie();
      
      $movie->setTranslation('name','en',$request->validated()['name_en']);
      $movie->setTranslation('name','ka',$request->validated()['name_ka']);
      
      
      $movie->save();
      return redirect('/add/movie')->with('success','Movie has been added');
   }

   public function edit(Movie $movie): View
   
   {
      return view('editMovie',['movie'=>$movie,'movies'=>Movie::all()]);
      
   }
   public function update(Movie $movie,StoreMovieRequest $request): RedirectResponse
   {
     
      $movie->setTranslation('name','en',$request->validated()['name_en']);
      $movie->setTranslation('name','ka',$request->validated()['name_ka']);
      $movie->update();
     
     return redirect('/add/movie')->with('success','Movie has been updated!');
   }

}