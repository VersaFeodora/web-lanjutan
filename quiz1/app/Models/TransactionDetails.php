<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;
    protected $table = 'transactiondetails';
    protected $primaryKey = ['id'];
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity'
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
