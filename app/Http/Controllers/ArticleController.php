<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(){
        $categories = Category::all('name');
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => ['required', 'string', 'min:5'],
            'category' => ['required', 'exists:categories,name'],
            'description' => ['required', 'min:15'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('articles', 'public');
        $imageArray = ['image' => $imagePath];

        $data['category_id'] = Category::where('name', $data['category'])->first()->id;

        $article = auth()->user()->articles()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

        request()->session()->flash('success', $data['title'].' sucessfully uploaded');
        return redirect('home');
    }
}
