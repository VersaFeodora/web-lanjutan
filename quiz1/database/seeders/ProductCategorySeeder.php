<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productcategories')->insert([
            [
                'id'=>1,
                'category_name' => 'Fruits'
            ],
            [
                'id'=>2,
                'category_name' => 'Vegetables'
            ],
            [
                'id'=>3,
                'category_name' => 'Spices'
            ],
            [
                'id'=>4,
                'category_name' => 'Others'
            ]
        ]);
    }
}
