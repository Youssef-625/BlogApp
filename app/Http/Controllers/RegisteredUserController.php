<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $user=User::create(request()->validate([
           'first_name'=>['required'],
           'last_name'=>['required'],
            'email'=>['required','email'],
            'password'=>['min:3','required','confirmed'],
        ]));

        Auth::login($user);

        return redirect('jobs');

    }

}
