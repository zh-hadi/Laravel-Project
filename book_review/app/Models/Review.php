<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // public function scopeAvgRating(Builder $query): Builder
    // {
    //     return $query->avg
    // }


    protected static function booted()
    {
        static::updated(fn(Review $review)=> cache()->forget('book:'.$review->book_id));
        static::deleted(fn(Review $review)=> cache()->forget('book:'.$review->book_id));
    }
}
