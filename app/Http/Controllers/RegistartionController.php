<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\Welcome;

class RegistartionController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public  function store()
    {
        //validat th form

        $this->validate(request(),[
           'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        //create and save the user

       // $user = User::create(request(['name', 'email', bcrypt('password')]));

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => \Hash::make(request('password'))
            ]);

        //sing them in
        auth()->login($user);

        //when register send a welcome email to the user
        \Mail::to($user)->send(new Welcome($user));

        //redirect to the home page
        return redirect()->home();
    }
}
