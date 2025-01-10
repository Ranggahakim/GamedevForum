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
    $threads = Thread::latest();
    $categories = Category::all();

    if(request('search'))
    {
        $threads->where('title', 'like', '%' . request('search') . '%')
        ->orWhereHas('author', function ($q) {
            $q->where('name', 'like', '%' . request('search') . '%');
        });
    }
    return view('main', ['pageTitle' => 'Home Page', 'title' => 'Welcome to <br> Home Page', 'threads' => $threads->get(), 'newestThread' => Thread::latest()->first(), 'categories' => $categories]);

})->middleware(('auth'));

Route::get('/reportedThread', function () 
{
    $threads = Thread::has('reports')->get();
    $categories = Category::all();

    return view('main', ['pageTitle' => 'Reported Page', 'title' => 'Welcome to <br> Home Page', 'threads' => $threads, 'newestThread' => Thread::latest()->first(), 'categories' => $categories]);

})->middleware(('auth'))->name('reportedThread');

Route::get('/threads/{slug}', function($slug)
{
    $thread = Thread::findBySlug($slug);
    $categories = Category::all();

    return view('singleThread', ['thread' => $thread, 'categories' => $categories]);
});

Route::get('/author/{user:username}', function(User $user)
{
    $threads = $user->threads;
    $categories = Category::all();

    return view('main', ['pageTitle' => 'User : '. $user->name, 'title' => 'Threads by <br>'. $user->name, 'threads' => $threads, 'categories' => $categories]);
});

Route::get('/categories/{category:slug}', function(Category $category)
{
    $threads = $category->threads;
    $categories = Category::all();

    return view('main', ['pageTitle' => 'Category : '. $category->name, 'title' => 'Searching on '. $category->name, 'threads' => $threads, 'categories' => $categories]);
})->name('categories');

Route::get('/MyProfile', function()
{
    $user = Auth::user();
    $categories = Category::all();


    return view('account', ['pageTitle' => 'My Profile', 'title' => 'Threads by <br>'. $user->name, 'threads' => $user->threads, 'status' => 'view', 'categories' => $categories]);
});

Route::post('/MyProfile', [SignupController::class, 'update']);

Route::get('/MyProfile/edit', function()
{
    $user = Auth::user();
    $categories = Category::all();

    return view('account', ['pageTitle' => 'Edit Profile', 'status' => 'edit', 'categories' => $categories]);
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

Route::get('/threads/{thread:slug}/report', [PostController::class, 'report'])->middleware(('auth'));