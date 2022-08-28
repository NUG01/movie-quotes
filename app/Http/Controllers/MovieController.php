<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
   public function show()
   {
    return view('add');
   }

   public function create()
   {
    return view('add');
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
    'quote'=>'required|max:255|min:7',
    'thumbnail'=>'required|image'
   ]);
  
$attributes['thumbnail']=$file;



   Movie::create($attributes);
//    return redirect('/');
   }



   public function delete()
   {
    return view('add');
   }
}
