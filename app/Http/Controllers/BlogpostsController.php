<?php

namespace App\Http\Controllers;

use App\Models\blogposts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogpostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bdata=blogposts::all();
        return view('blog.index',compact('bdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $info=$request->validate([
            'topics' => 'required',
            'author_name' => 'required|string|min:3|max:255',
            'title' => 'required|min:4|max:255',
            'blog_content' => 'required',

        ]);
    blogposts::create($info);
    return redirect('/blog')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blogposts  $blogposts
     * @return \Illuminate\Http\Response
     */
    public function show(blogposts $blogposts)
    {
        //
        $bd = blogposts::where('user_id',Auth::id())->get();
        // dd($bd);
        return view('blog.show', compact('bd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blogposts  $blogposts
     * @return \Illuminate\Http\Response
     */
    public function edit(blogposts $blogposts,$id)
    {
        //
        // dd($blogposts);
        $bd = blogposts::find($id);
        return view('blog.edit', compact('bd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blogposts  $blogposts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blogposts $blogposts)
{
    $request->validate([
        'author_name' => 'required|string|min:3|max:255',
        'title' => 'required|min:4|max:255',
        'blog_content' => 'required',

    ]);
    $blogposts->user_id=$request->user_id;
    $blogposts->author_name=$request->author_name;
    $blogposts->title=$request->title;
    $blogposts->blog_content=$request->blog_content;
    $blogposts->save();


    return redirect('/blog')->with('success', 'Post created successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blogposts  $blogposts
     * @return \Illuminate\Http\Response
     */
    public function destroy(blogposts $blogposts,$id)
    {
        //
        $blogpost = blogposts::find($id);
    if ($blogpost) {
        $blogpost->delete();
        return redirect()->route('blog.index')->with('success', 'Blog post deleted successfully');
    } else {
        return redirect()->route('blog.index')->with('error', 'Blog post not found');
    }
    }
}
