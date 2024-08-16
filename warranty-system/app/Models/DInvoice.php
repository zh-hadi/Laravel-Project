<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DInvoice extends Model
{
    use HasFactory;

    protected $table = 'd_invoices';

    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->hasMany(Product::class,  "d_invoice_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
