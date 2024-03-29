<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'product_category',
        'product_code',
        'product_name',
        'product_stock',
        'price'
    ];
}
