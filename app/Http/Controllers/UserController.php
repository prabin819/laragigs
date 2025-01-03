<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/create form
    public function create(){
        return view('users.register');
    }

    //create new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ], [
            'name.required' => 'Your name is required.',
            'name.min' => 'Your name must be at least 3 characters.',
            'email.required' => 'An email address is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'A password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 6 characters.'
        ]);

        //hash password
    $formFields['password'] = bcrypt($formFields['password']);

    //create user
    $user = User::create($formFields);

    //login
    auth()->login($user);

    return redirect('/')->with('message','User created and loggedin');
    }


    //logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }

    //show login form
    public function login(){
        return view('users.login');
    }


    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ], [
            'email.required' => 'An email address is required.',
            'password.required' => 'A password is required.',
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You have been logged in');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

        }

}
