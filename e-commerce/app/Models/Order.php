<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;


    // public function user():HasOne
    // {
    //     return $this->hasOne(User::class);
    // }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
