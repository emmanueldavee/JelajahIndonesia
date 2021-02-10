<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(){
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }

    public function update(User $user){
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            // Adds additional validation for the phone field
            'phone' => ['required', 'digits_between:8,12']
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];

        $user->save();

        return redirect('/home');
    }
}
