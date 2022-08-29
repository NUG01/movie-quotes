<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function store()
    {
           $attributes= request()->validate([
             'username'=>'required',
             'password'=>'required'
            ]);

            if(auth()->attempt($attributes)){
                session()->regenerate();
                  return redirect('/')->with('success','You have been logged in');
            }



            return redirect("/login")->withErrors(['username'=>'Provided username could not be verified','password'=>"Provided password is wrong"]);
        
    }

    public function create()
    {
    
 
 
 return view('login');
 
//    auth()->login()
 
    // session()->flash('success','Movie has been added.');
    // return redirect('/add/movie')->with('success','You have been logged');
    }

    public function destroy(){
       auth()->logout();

       return redirect('/')->with('success','Goodbye');
    }
}
