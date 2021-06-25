<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::all();
    if(!$posts){
        throw new ModelNotFoundException();
    }
    return view('welcome',["posts"=>$posts]);
})->name("home");

Route::get("/show/post/{id}",function($id){
    $post = Post::findOrFail($id);
    return view('showPost',["post"=>$post]);
})->name("show-post");


Route::middleware("auth")->group(function(){
    Route::get("/dashboard",[DashboardController::class,'index'])->name("dashboard");
    Route::resource("posts",PostController::class);
});

require __DIR__.'/auth.php';
