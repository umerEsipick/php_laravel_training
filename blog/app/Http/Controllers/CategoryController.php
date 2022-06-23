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

        return redirect('category');
    }

    public function edit($id)
    {
        $categories = Category::findorfail($id);
        return view('category.edit')->with('categories', $categories); 
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:20|min:3'
        ]);

        if($validator->fails())
        {
            return redirect('category/' . $id . '/edit')->withInput()->withErrors($validator);
        }

        $category = Category::find($id);
        $category->name = $request->Input('name');
        $category->save();

        Session::flash('category_update','Category updated');

        return redirect('category');
    }

    public function destroy($id)
    {
         $categories = Category::find($id);
         $categories->delete();
         Session::flash('category_delete','Category deleted');
         return redirect('category');
    }

}
