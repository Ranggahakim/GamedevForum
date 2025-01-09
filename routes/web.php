<?php

use App\Models\User;
use App\Models\Thread;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

Route::get('/', function()
{
    return redirect('/home');
});

Route::get('/home', function () 
{
    $threads = Thread::latest()->get();

    return view('main', ['pageTitle' => 'Home Page', 'title' => 'Welcome to <br> Home Page', 'threads' => $threads, 'newestThread' => Thread::latest()->first()]);
})->middleware(('auth'));

Route::get('/threads/{slug}', function($slug)
{
    $thread = Thread::findBySlug($slug);

    return view('singleThread', ['thread' => $thread]);
});

Route::get('/author/{user:username}', function(User $user)
{
    $threads = $user->threads;

    return view('main', ['pageTitle' => 'User : '. $user->name, 'title' => 'Threads by <br>'. $user->name, 'threads' => $threads]);
});

Route::get('/categories/{category:slug}', function(Category $category)
{
    $threads = $category->threads;

    return view('main', ['pageTitle' => 'Category : '. $category->name, 'title' => 'Searching on '. $category->name, 'threads' => $threads]);
});

Route::get('/MyProfile', function()
{
    $user = Auth::user();

    return view('account', ['pageTitle' => 'My Profile', 'title' => 'Threads by <br>'. $user->name, 'threads' => $user->threads, 'status' => 'view']);
});

Route::post('/MyProfile', [SignupController::class, 'update']);

Route::get('/MyProfile/edit', function()
{
    $user = Auth::user();

    return view('account', ['pageTitle' => 'Edit Profile', 'status' => 'edit']);
});

    
Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/create', [PostController::class, 'open'])->middleware(('auth'));
Route::post('/create', [PostController::class, 'post'])->middleware(('auth'));

Route::get('/threads/{thread:slug}/edit', function(Thread $thread)
{
    $user = Auth::user();
    $categories = Category::all();
    
    return view('create', ['pageTitle' => 'Update Thread!', 'status' => 'edit', 'thread' => $thread, 'categories' => $categories]);
});

Route::post('/threads/{thread:slug}/edit', [PostController::class, 'update'])->middleware(('auth'));
Route::get('/threads/{thread:slug}/remove', [PostController::class, 'remove'])->middleware(('auth'));
