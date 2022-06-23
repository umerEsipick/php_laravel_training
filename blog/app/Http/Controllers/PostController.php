<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as ModelsCategory;

class PostController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        return view('post.main') ;
    }
    
    public function create()
    {
        $categories = array();

        foreach (ModelsCategory::all() as $category) {
            $categories[$category->id] = $category->name;
        }

        return view('post.create')->with('categories', $categories);
    }
}
