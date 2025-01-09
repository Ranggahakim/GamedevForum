<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup', [
            'pageTitle' => 'Sign Up'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'max:255', 'min:3', 'unique:users'], 
            'email' => 'required|email:dns|unique:users', 
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        return $validatedData;

        User::create($validatedData);

        session()->flash('success', 'Task was successful! Please login');

        return redirect('/login');        
    }

    public function update(Request $request)
    {
        // return $request;

        $validatedData =  $request->validate([
            'bio' => 'required'
        ]);

        if(Auth::user()->username != $request['username'])
        {
            $validatedData['username'] =  'required, max:255, min:3, unique:users';
        }

        User::where('id', Auth::id())
        ->update($validatedData);

        return redirect('/MyProfile');
    }
}
