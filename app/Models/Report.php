<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;
    
    protected $fillable = ['reason', 'status', 'thread_id'];

    protected $with = ['thread'];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }
}
