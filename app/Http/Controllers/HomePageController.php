<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomePageController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('front.all')->with('blogs', $blogs);
    }
}