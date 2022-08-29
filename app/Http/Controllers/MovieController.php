<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\DB;

class MovieController extends Controller
{
   public function show()
   {
      $unique = Movie::all()->unique('name');
     
      return view('add', ['movies'=>$unique]);
   }
   



   public function store()
   {
   
    if (request()->file('thumbnail') == null) {
        $file = "";
    }else{
       $file = request()->file('thumbnail')->store('thumbnails');  
    }

//    $path=request()->file('thumbnail')->store('thumbnails');
  $attributes= request()->validate([
    'name'=>'required',
    'quote'=>'required|max:255|min:7|unique:movies,quote',
    'thumbnail'=>'required|image'
   ]);
  
$attributes['thumbnail']=$file;



   Movie::create($attributes);

   // session()->flash('success','Movie has been added.');
   return redirect('/add/movie')->with('success','Movie has been added');
   }



   public function delete()
   {
    return view('add');
   }
}
