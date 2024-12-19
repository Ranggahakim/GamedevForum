<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Thread extends Model
{
    use HasFactory;

    protected $with = ['author', 'category'];

    public static function findBySlug($slug)
    {
        $thread = Arr::first(static::all(), fn($thread) => $thread['slug'] == $slug);
        
        if(! $thread)
        {
            abort(404);
        }

        return $thread;
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
