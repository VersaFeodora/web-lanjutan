<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;
    protected $table = 'transactiondetails';
    protected $primaryKey = ['id'];
    public $timestamp = false;
    public $incrementing = false;
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'rating'
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
