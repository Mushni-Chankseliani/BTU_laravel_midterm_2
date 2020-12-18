<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.table')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'text' => ['required'],
        ]);
        // dd($request);

        auth()->user()->blogs()->create([
            'title' => $request->title,
            'slug' => $request->slug . Str::random(),
            'text' => $request->text,
        ]);


        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Blog::findOrFail($id);

        return view('admin.edit')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Blog::findOrFail($id);

        $request->validate([
            'title' => ['required'],
            'slug' => ['required'],
            'text' => ['required'],
        ]);

        $data->update(
            [
                'title' => $request->title,
                'slug' => $request->slug . Str::random(),
                'text' => $request->text,
                'user_id' => auth()->user()->id,
            ]
        );

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);

        $data->delete();

        return redirect()->route('admin.blogs.index');


        //
    }


    public function delete(Request $request)
    {


        $data = Blog::findOrFail(intval($request->id));

        $data->delete();

        return response()->json(true);


        //
    }

}
