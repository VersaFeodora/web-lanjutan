<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'=>'seller1',
                'first_name'=>'John',
                'last_name'=>'Doe',
                'email'=>'johndoe420@gmail.com',
                'phonenumber'=>'81294932758',
                'address'=>'Jl. Cempaka Putih No. 5, Jakarta',
                'roles_id'=>1,
                'password'=>'seller1'
            ],
            [
                'username'=>'seller2',
                'first_name'=>'Mary',
                'last_name'=>'Jane',
                'email'=>'maryme@gmail.com',
                'phonenumber'=>'843430598321',
                'address'=>'Jl. Tirta Blok A 43D, Malang',
                'roles_id'=>1,
                'password'=>'seller2'
            ],
            [
                'username'=>'buyer1',
                'first_name'=>'Gary',
                'last_name'=>'Stu',
                'email'=>'gastu23434@gmail.com',
                'phonenumber'=>'835243253224',
                'address'=>'Perum Pelita F4 I32, Solo',
                'roles_id'=>2,
                'password'=>'buyer1'
            ],
            [
                'username'=>'buyer2',
                'first_name'=>'Mary',
                'last_name'=>'Sue',
                'email'=>'aaaaaaaaaa@gmail.com',
                'phonenumber'=>'843436657765',
                'address'=>'Jl. in Aja Dulu Y4, Magelang',
                'roles_id'=>2,
                'password'=>'buyer2'
            ]
        ]);
    }
}
