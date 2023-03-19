<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id'=>1,
                'seller_id'=>2,
                'file_path'=>'/quiz1/public/assets/img/product/apples.jpg',
                'product_name'=>'Red Apples (kgs)',
                'product_stock'=>999,
                'price'=>40000,
                'description'=>'UMKM product from Batu'
            ],
            [
                'category_id'=>2,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/cabbages.jpg',
                'product_name'=>'Cabbages',
                'product_stock'=>200,
                'price'=>20000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>2,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/cabbages.jpg',
                'product_name'=>'Cabbages',
                'product_stock'=>200,
                'price'=>20000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>2,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/carrots.jpg',
                'product_name'=>'Carrots (kgs)',
                'product_stock'=>500,
                'price'=>18000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>3,
                'seller_id'=>2,
                'file_path'=>'/quiz1/public/assets/img/product/cinnamon.jpg',
                'product_name'=>'Cinnamon (ons)',
                'product_stock'=>100,
                'price'=>15000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>3,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/ginger.jpg',
                'product_name'=>'Ginger (ons)',
                'product_stock'=>120,
                'price'=>10000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>4,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/coffee.jpg',
                'product_name'=>'Coffee (ons)',
                'product_stock'=>150,
                'price'=>20000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>1,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/green-apples.jpg',
                'product_name'=>'Green Apples (kgs)',
                'product_stock'=>1000,
                'price'=>25000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>2,
                'seller_id'=>2,
                'file_path'=>'/quiz1/public/assets/img/product/green-bell-peppers.jpg',
                'product_name'=>'Green Bell Peppers (kgs)',
                'product_stock'=>500,
                'price'=>21000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>1,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/melon.jpg',
                'product_name'=>'Melon',
                'product_stock'=>100,
                'price'=>30000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>3,
                'seller_id'=>2,
                'file_path'=>'/quiz1/public/assets/img/product/pepper.jpg',
                'product_name'=>'Pepper (ons)',
                'product_stock'=>2000,
                'price'=>10000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>2,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/red-bell-peppers.jpg',
                'product_name'=>'Red Bell Peppers (kgs)',
                'product_stock'=>500,
                'price'=>20000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>2,
                'seller_id'=>1,
                'file_path'=>'/quiz1/public/assets/img/product/red-bell-peppers.jpg',
                'product_name'=>'Red Bell Peppers (kgs)',
                'product_stock'=>500,
                'price'=>20000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
            [
                'category_id'=>4,
                'seller_id'=>2,
                'file_path'=>'/quiz1/public/assets/img/product/tea-leaves.jpg',
                'product_name'=>'Tea Leaves (ons)',
                'product_stock'=>430,
                'price'=>10000,
                'description'=>'Lorem Ipsum Dolor Sit Amet'
            ],
        ]);
    }
}
