<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $categories = Category::all();
        $articles = $category->articles;
        return view('categories.show', compact('articles', 'categories'));
    }
}
