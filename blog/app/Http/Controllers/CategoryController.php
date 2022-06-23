<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Category;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.main')->with('categories', $categories);
    }
    
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:20|min:3'
        ]);

        if($validator->fails())
        {
            return redirect('/category/create')->withInput()->withErrors($validator);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('category_create','New category is created');

        return redirect('/category/create');
    }

    public function edit($id)
    {
        $categories = Category::findorfail($id);
        return view('category.edit')->with('categories', $categories); 
    }

}
