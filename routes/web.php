<?php

use Illuminate\Support\Facades\Route;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Attachment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $post = Post::find(11);
    dd($post->tags);

    return view('welcome');
});
