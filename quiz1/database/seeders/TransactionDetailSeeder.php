<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactiondetails')->insert([
            [
                'transaction_id'=>3,
                'product_id'=>2,
                'quantity'=>8
            ],
            [
                'transaction_id'=>2,
                'product_id'=>6,
                'quantity'=>10
            ],
            [
                'transaction_id'=>1,
                'product_id'=>9,
                'quantity'=>12
            ],
            [
                'transaction_id'=>4,
                'product_id'=>9,
                'quantity'=>20
            ],
            [
                'transaction_id'=>4,
                'product_id'=>3,
                'quantity'=>10
            ],
            [
                'transaction_id'=>1,
                'product_id'=>4,
                'quantity'=>15
            ],
            [
                'transaction_id'=>2,
                'product_id'=>5,
                'quantity'=>10
            ],
        ]);
    }
}
