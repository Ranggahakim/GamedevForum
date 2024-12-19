<?php

use App\Models\User;
use App\Models\Thread;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    $threads = Thread::latest()->get();

    return view('main', ['pageTitle' => 'Home Page', 'title' => 'Welcome to <br> Home Page','threads' => $threads, 'newestThread' => Thread::latest()->first()]);
});

Route::get('/threads/{slug}', function($slug)
{
    $thread = Thread::findBySlug($slug);

    return view('singleThread', ['thread' => $thread]);
});

Route::get('/author/{user:username}', function(User $user)
{
    $threads = $user->threads;

    return view('main', ['pageTitle' => 'User : '. $user->name, 'title' => 'Threads by '. $user->name, 'threads' => $threads]);
});

Route::get('/categories/{category:slug}', function(Category $category)
{
    $threads = $category->threads;

    return view('main', ['pageTitle' => 'Category : '. $category->name, 'title' => 'Searching on '. $category->name, 'threads' => $threads]);
});