<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function top(){
        $posts = \App\Models\Post::all();
        return view('home.top',compact("posts"));
    }

    public function show($id){
        $post = \App\Models\Post::find($id);
        return view('home.show', compact("post"));   
    }

    public function new(){
        return view('home.new');
    }

    public function create(Request $request)
    {
        $title = $request->input("title");
        \App\Models\Post::create(["title" => $title]);
        return redirect("/hello");
    }

    public function edit($id)
    {
        $post = \App\Models\Post::find($id);
        return view('home.edit',compact("post"));
    }

    public function update(Request $request,$id)
    {
        $post = \App\Models\Post::find($id);
        $post->title = $request->title;
        $post->save();
        return redirect("/hello");
    }

    public function destroy($id){
        $post = \App\Models\Post::find($id);
        $post->delete();
        return redirect("/hello");
    }
}