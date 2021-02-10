<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $categories = Category::all();
        $articles = Article::all()->take(3);
        return view('users.home', compact('articles', 'categories'));
    }

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

    public function adminUser(){
        $type = 'user';
        $categories = Category::all();
        $users = User::where('role', 'user')->get();
        return view('users.admin', compact('categories', 'users', 'type'));
    }

    public function adminAdmin(){
        $type = 'admin';
        $categories = Category::all();
        $users = User::where('role', 'admin')->get();
        return view('users.admin', compact('categories', 'users', 'type'));
    }

    public function destroy(User $user){
        $name = $user->name;
        $user->delete();

        request()->session()->flash('success', $name.' sucessfully deleted');
        return redirect('/admin/home');
    }

    public function blogs(User $user){
        $articles = $user->articles;
        $categories = Category::all();

        return view('users.articles', compact('articles', 'categories', 'user'));
    }
}
