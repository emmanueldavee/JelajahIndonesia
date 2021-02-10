<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(){
        // Get the record of the signed in user
        $user = auth()->user();

        // Redirect to the view
        return view('users.edit', compact('user'));
    }

    public function update(User $user){
        // Validation
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            // Adds additional validation for the phone field
            'phone' => ['required', 'digits_between:8,12']
        ]);

        // Updates the fields
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        
        // Saving the new user record with the updated fields
        $user->save();

        return redirect('/home');
    }
}
