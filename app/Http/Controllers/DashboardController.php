<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::where("user_id","=",Auth::id())->get();
        cache()->put("posts",$posts,now()->addMinute(20));
        return view("dashboard");
    }
}
