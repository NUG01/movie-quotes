<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Movie;
use App\Http\Controllers\MovieController;

class QuoteController extends Controller
{


public function show(){
    return view('addQuote',['quotes'=>Quote::all(),'allMovie'=>Movie::all()]);
}

    
    public function destroy(Quote $quote){
        $quote->delete();
        return redirect('/add/quote')->with('success','Quote has been deleted');
}



    public function store()
   {
   
        if (request()->file('thumbnail') == null) {
        $file = "";
    }else{
         $file = request()->file('thumbnail')->store('thumbnails');  }

        $attributes= request()->validate([
             'movie_id'=>'required',
             'quote'=>'required|max:255|min:7|unique:quotes,quote',
             'thumbnail'=>'required|image'
    ]);
    
          $attributes['thumbnail']=$file;
          $attributes['movie_id']=Movie::where('name',$attributes['movie_id'])->first()->id;

 
Quote::create($attributes);  
   // session()->flash('success','Movie has been added.');
   return redirect('/add/quote')->with('success','Quote has been added');
}

public function edit(Quote $quote)
{
    return view('editQuotes',['quote'=>$quote,'allMovie'=>Movie::all()]);
}

    public function update(Quote $quote){
         
    if (request()->file('thumbnail') == null) {
        $file = $quote->thumbnail;
    }else{
       $file = request()->file('thumbnail')->store('thumbnails');  }

       $attributes= request()->validate([
           'movie_id'=>'required',
            'quote'=>'required|max:255|min:7|unique:quotes,quote',
            'thumbnail'=>'image'
        ]);

        $attributes['thumbnail']=$file;
        $attributes['movie_id']=Movie::where('name',$attributes['movie_id'])->first()->id;
        
        $quote->update($attributes);
        
        return redirect('/add/quote')->with('success','Quote has been updated!');
   }

}
