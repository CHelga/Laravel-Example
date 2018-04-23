<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->id();

        $this->comments()->create(compact('body', 'user_id'));
    }

    public function user()  //post->user->name
    {
        return $this->belongsTo(User::class);
    }

        //if we want to modify the archives
    public function scopeFilter($query, $filters)
    {
        if(isset($filters['month'])) {
            if ($month = $filters['month']) {
                $query->whereMonth('created_at', Carbon::parse($month)->month); //March=3
            }
        }

        if(isset($filters['theyear'])) {
            if ($year = $filters['theyear']) {
                $query->whereYear('created_at', $year);
            }
        }
    }

    public static function archives()
    {
       return static::selectRaw('year (created_at) theyear, monthname(created_at) month, COUNT(*) published')
            ->groupBy('theyear','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
