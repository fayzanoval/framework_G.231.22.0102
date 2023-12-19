<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData  = $request->validate([
            'username' => 'required|min:4|max:255|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successfull! please login');

        return redirect('/login')->with('success', 'Registration successfull! please login');

    }
}