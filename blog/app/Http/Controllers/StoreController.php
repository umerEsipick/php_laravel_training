<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.main')->with('posts', Post::orderBy('created_at', 'DESC')->get());
    }
}
