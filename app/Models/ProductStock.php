<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable=[
       
       'stock',
       'selling_price',
       'purchasing_price',
       'product_tax',
       'product_brand_id',
    ];
}
