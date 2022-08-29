<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
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



   // Movie::create($attributes);
   // Quote::create($attributes);
  Quote::create([
   'movies_id' => $attributes['name'],
   'quote' => $attributes['quote'],
   'thumbnail' =>$attributes['thumbnail'],
]);

   // session()->flash('success','Movie has been added.');
   return redirect('/add/movie')->with('success','Movie has been added');
   }
}
