<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'buyer_id'=>3,
                'transaction_date'=>'2022-04-20',
                'status'=>'complete'
            ],
            [
                'buyer_id'=>3,
                'transaction_date'=>'2022-04-20',
                'status'=>'on delivery'
            ],
            [
                'buyer_id'=>4,
                'transaction_date'=>'2022-12-03',
                'status'=>'complete'
            ],
            [
                'buyer_id'=>4,
                'transaction_date'=>'2022-11-05',
                'status'=>'on delivery'
            ],
            [
                'buyer_id'=>4,
                'transaction_date'=>'2022-11-05',
                'status'=>'complete'
            ]
        ]);
    }
}
