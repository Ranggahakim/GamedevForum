<?php

use App\Models\Thread;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $thread = Thread::with(['author', 'category'])->latest()->get();

    return view('main', ['threads' => Thread::all()]);
});

Route::get('/threads/{slug}', function($slug)
{
    $thread = Thread::find($slug);
    return view('singleThread', ['thread' => $thread]);

    
});