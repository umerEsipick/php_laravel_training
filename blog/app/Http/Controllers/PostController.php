<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Session;
use App\Models\Category as ModelsCategory;
use App\Models\Post;

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id'=>'required|integer',
            'title'=>'required|max:20|min:3',
            'author'=>'required|max:20|min:3',
            'image'=>'required|mimes:jpg,jpeg,png,gif',
            'short_desc'=>'required|max:50|min:10',
            'description'=>'required|max:1000|min:50 ',
        ]);

        if($validator->fails())
        {
            return redirect('/post/create')->withInput()->withErrors($validator);
        }

        $image = $request->file('image');
        $upload = 'img/posts/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathname(), $upload.$filename);

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->image = $filename;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->save();

        Session::flash('post_create','New post is created');

        return redirect('post');
    }

    // public function edit($id)
    // {
    //     $categories = Category::findorfail($id);
    //     return view('category.edit')->with('categories', $categories); 
    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name'=>'required|max:20|min:3'
    //     ]);

    //     if($validator->fails())
    //     {
    //         return redirect('category/' . $id . '/edit')->withInput()->withErrors($validator);
    //     }

    //     $category = Category::find($id);
    //     $category->name = $request->Input('name');
    //     $category->save();

    //     Session::flash('category_update','Category updated');

    //     return redirect('category');
    // }

    // public function destroy($id)
    // {
    //      $categories = Category::find($id);
    //      $categories->delete();
    //      Session::flash('category_delete','Category deleted');
    //      return redirect('category');
    // }

}
