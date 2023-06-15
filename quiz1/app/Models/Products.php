<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = ['id'];
    public $incrementing = false;
    public $timestamp = false;
    protected $fillable = [
        'category_id',
        'seller_id',
        'file_path',
        'product_name',
        'product_stock',
        'price',
        'description'
    ];
    public function productcategory()
    {
        return $this->belongsTo(ProductCategories::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetails::class);
    }
}