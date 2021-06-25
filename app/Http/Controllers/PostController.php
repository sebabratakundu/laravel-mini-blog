<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidation;
use App\Models\Post;
// use App\Models\User;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Gate;

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
    public function store(PostValidation $request)
    {
        // dd($request->all());
        // if(Gate::denies("isAdmin",Post::class)){
        //     abort(403,"You do not have access to create post, sorry !");
        // }
        
        // Gate::authorize("isAdmin");

        // $response = Gate::inspect("isAdmin");
        // if($response->allowed()){

        //     $request->user()->posts()->create($request->validated());
        //     return redirect(route("create-post"))->with(["status"=>"post created !"]);
        // }else{

        //     return $response->message();
        // }

        $request->user()->posts()->create($request->validated());
        return redirect(route("posts.create"))->with(["status"=>"post created !"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize("view",$post);
        return view("showPost",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update',$post);
        return view("editPost",["post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidation $request,Post $post)
    {  
        $this->authorize('update',$post);
        $post->update($request->validated());

        return redirect(route("dashboard"))->with(["status"=>"post updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect(route("dashboard"))->with(["status"=>"post deleted"]);
    }
}
