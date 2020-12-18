<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    //

    public function index($slug) {
        $data = Blog::where('slug', $slug)->firstOrFail();

        return view('front.single')->with('data', $data);
    }
}
