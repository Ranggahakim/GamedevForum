<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function open()
    {
        $categories = Category::all();

        // return $categories;
        return view('/create', ['pageTitle' => 'Create A Thread!', 'categories' => $categories]);
    }

    public function post(Request $request)
    {
        $validatedData =  $request->validate([ 
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required' 
        ]);

        $validatedData['author_id'] = Auth::id();
        $validatedData['slug'] = Str::slug($validatedData['title']) . '-' . now()->format('YmdHis') . '-' . Auth::id();

        Thread::create($validatedData);

        return redirect("threads/". $validatedData['slug']);
    }
}
