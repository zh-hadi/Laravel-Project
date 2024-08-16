<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if($from && !$to){
            $query->where('created_at', '>=', $from);
        }elseif(!$from && $to){
            $query->where('created_at', '<=', $to);
        }elseif($from && $to){
            $query->whereBetween('created_at', [$from, $to]);
        }
    }

    

    public function scopeMinReviews(Builder $query, int $minReviews): Builder
    {
        return $query->havingRaw('reviews_count > ?', [$minReviews]);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', "%".$title . "%");
    }

    public function scopeWithAvgRating(Builder $query , $from = null, $to = null):Builder
    {
        return $query->withAvg(['reviews'=> function($query, $from = null, $to = null){
            if($from && !$to){
                $query->where('created_at', '>=', $from);
            }elseif(!$from && $to){
                $query->where('created_at', '<=', $to);
            }elseif($from && $to){
                $query->whereBetween('created_at', [$from, $to]);
            }
        }], 'rating');
    }

    public function scopeWithCountReviews(Builder $query):Builder
    {
        return $query->dateRangeFilter();
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withCount(['reviews' => fn ($q)=> $this->dateRangeFilter($q, $from, $to)])
                    ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRating(Builder $query, $from = null, $to = null):Builder
    {
        return $query->withAvgRating($query, $from, $to)
                ->orderBy('reviews_avg_rating', 'desc');
    }


    
public function scopePopularLastMonth(Builder $query): Builder
    {
        return $query->popular(now()->subMonth(), now())
                ->highestRating(now()->subMonth(), now())
                ->minReviews(2);
    }
    public function scopePopularLast6Months(Builder $query): Builder
    {
        return $query->popular(now()->subMonths(6), now())
                ->highestRating(now()->subMonths(6), now())
                ->minReviews(5);
    }


    public function scopeHeighestRatedLastMonth(Builder $query): Builder
    {
        return $query->highestRating(now()->subMonth(), now())
                ->popular(now()->subMonth(), now())
                ->minReviews(2);
    }

    public function scopeHeighestRatedLast6Months(Builder $query): Builder
    {
        return $query->highestRating(now()->subMonths(6), now())
                ->popular(now()->subMonths(6), now())
                ->minReviews(5);
    }


    // practice scope
    public function scopeAllTitle(Builder $query):Builder
    {
        return $query->select('title');
    }   
}
