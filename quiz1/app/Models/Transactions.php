<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = ['id'];
    public $incrementing = false;
    public $timestamp = false;
    protected $fillable = [
        'buyer_id',
        'transaction_date' => 'datetime',
        'status'
    ];
    protected $casts = ['transaction_date' => 'datetime'];
    public function buyer()
    {
        return $this->belongsTo(User::class, 'id', 'buyer_id');
    }
    public function transactiondetail() {
        return $this->hasMany(TransactionDetails::class);
    }
}
