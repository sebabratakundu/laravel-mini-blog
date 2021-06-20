<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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
    return view('welcome',["posts"=>$posts]);
})->name("home");

Route::get("/show/post/{id}",[PostController::class,"show"])->name("show-post");
Route::middleware("auth")->group(function(){
    Route::get('/dashboard', [PostController::class,'index'])->name('dashboard');

    Route::get("/create-post",[PostController::class,"create"])->name("create-post");
    Route::post("/create-post",[PostController::class,"store"])->name("store-post");

    Route::get("/edit/post/{id}",[PostController::class,"edit"])->name("edit-post");
    Route::put("/edit/post/{id}",[PostController::class,"update"])->name("update-post");

    Route::get("/delete/post/{id}",[PostController::class,"destroy"])->name("delete-post");
});

require __DIR__.'/auth.php';
