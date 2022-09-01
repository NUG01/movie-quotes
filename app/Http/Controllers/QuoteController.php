<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Movie;
use App\Http\Controllers\MovieController;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;


class QuoteController extends Controller
{


public function show(): View
{
   
        return view('addQuote',['quotes'=>Quote::all(),'allMovie'=>Movie::all()]);
   
}

    
    public function destroy(Quote $quote): RedirectResponse
    {
        $quote->delete();
        return redirect('/add/quote')->with('success','Quote has been deleted');
}



    public function store(StorePostRequest $request): RedirectResponse
   {

  $attributes= $request->validated();


        if ($request->file('thumbnail') == null) {
        $thumbnail = "";
    }else{
         $thumbnail = $request->file('thumbnail')->store('thumbnails');  
     }
    
          $attributes['thumbnail']=$thumbnail;
          $attributes['movie_id']=Movie::where('name',$attributes['movie_id'])->first()->id;

 
       Quote::create($attributes);  
   return redirect('/add/quote')->with('success','Quote has been added');
}

public function edit(Quote $quote): View
{
    return view('editQuotes',['quote'=>$quote,'allMovie'=>Movie::all()]);
}

    public function update(Quote $quote, StorePostRequest $request): RedirectResponse
    {
         $attributes=$request->validated();
    if ($request->file('thumbnail') == null) {
        $file = $quote->thumbnail;
    }else{
       $file = $request->file('thumbnail')->store('thumbnails');  }

      

        $attributes['thumbnail']=$file;
        $attributes['movie_id']=Movie::where('name',$attributes['movie_id'])->first()->id;
        
        $quote->update($attributes);
        
        return redirect('/add/quote')->with('success','Quote has been updated!');
   }

}
