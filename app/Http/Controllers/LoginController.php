<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{

    public function store(StoreUserRequest $request): RedirectResponse
    {

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            session()->regenerate();
            return redirect('/add/movie')->with('success', 'You have been logged in');
        }

        return redirect("/login")->withErrors(['username' => 'Provided username could not be verified', 'password' => "Provided password is wrong"]);
    }


    public function show(): View
    {

        return view('login');
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect('/login')->with('success', 'Goodbye');
    }
}
