<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'address'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function ScopeNames(Builder $query, string $name): Builder
    {
        return $query->where('name', 'like', $name);
    }

    public function scopeWithCountProducts(Builder $query):Builder
    {
        return $query->withCount(['products' => fn(Builder $q) => $q->where('d_invoice_id', 0)->orderBy('products_count', 'desc') ]);
    }
}
