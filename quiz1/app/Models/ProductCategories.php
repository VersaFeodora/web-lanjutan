<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'productcategories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name'
    ];

    public function product() {
        return $this->hasMany(Products::class);
    }
}
