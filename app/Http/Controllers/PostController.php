<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("user_id","=",Auth::id())->get();
        return view("dashboard",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createPost");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $post = new Post();
        $post->title= $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->desc;

        $user->posts()->save($post);
        return redirect(route("create-post"))->with(["status"=>"post created !"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$id)
    {
        return view("showPost",["post"=>$post::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        return view("editPost",["post"=>$post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,$id)
    {  
       $post::where("id",$id)->update([
           "title"=>$request->title,
           "excerpt"=>$request->excerpt,
           "body"=>$request->desc
       ]);

       return redirect(route("dashboard"))->with(["status"=>"post updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
        $post::destroy($id);
        return redirect(route("dashboard"))->with(["status"=>"post deleted"]);
    }
}
