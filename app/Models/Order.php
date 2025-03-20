<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'product_id',

        'address',
        'quantity',
        'status',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
