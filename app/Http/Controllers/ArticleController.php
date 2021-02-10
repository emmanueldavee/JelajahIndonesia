<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $categories = Category::all();
        $articles = Article::orderBy('created_at', 'DESC')->get();
        $top = Article::all()->take(3);
        return view('articles.index', compact('articles', 'top', 'categories'));
    }

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

    public function destroy(Article $article){
        $title = $article->title;
        $article->delete();

        request()->session()->flash('success', $title.' sucessfully deleted');
        return redirect()->back();
    }

    public function show(Article $article){
        $categories = Category::all();
        return view('articles.show', compact('categories', 'article'));
    }
}
