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
            [//1
                'product_category'=>'Food',
                'product_code'=>'IDMIEP003',
                'product_name'=>'Indomie Goreng',
                'product_stock'=>999,
                'price'=>2000,
            ],
            [//2
                'product_category'=>'Food',
                'product_code'=>'IDMIEP006',
                'product_name'=>'Indomie Ayam Bawang',
                'product_stock'=>100,
                'price'=>2300,
            ],
            [//3
                'product_category'=>'Snack',
                'product_code'=>'SVQM01',
                'product_name'=>'Silverqueen Almond Medium',
                'product_stock'=>300,
                'price'=>15000,
            ],
            [//4
                'product_category'=>'Drink',
                'product_code'=>'SVQL06',
                'product_name'=>'Silverqueen Dark Choco Large',
                'product_stock'=>160,
                'price'=>25000,
            ],
            [//5
                'product_category'=>'Drink',
                'product_code'=>'IDMILKM08',
                'product_name'=>'Indomilk Coconut Delight 300ml',
                'product_stock'=>300,
                'price'=>5700,
            ],
            [//6
                'product_category'=>'Drink',
                'product_code'=>'ABCDRINK09M',
                'product_name'=>'ABC Kacang Hijau 450ml',
                'product_stock'=>479,
                'price'=>6900,
            ],
            [//7
                'product_category'=>'Drink',
                'product_code'=>'ABCDRINK03M',
                'product_name'=>'ABC Susu Kedelai 450ml',
                'product_stock'=>597,
                'price'=>6700,
            ],
            [//8
                'product_category'=>'Food',
                'product_code'=>'KOKOC01',
                'product_name'=>'Koko Crunch',
                'product_stock'=>300,
                'price'=>26800,
            ],
            [//9
                'product_category'=>'Others',
                'product_code'=>'SGTB600',
                'product_name'=>'Segitiga Biru 600gr',
                'product_stock'=>100,
                'price'=>32000,
            ],
            [//10
                'product_category'=>'Food',
                'product_code'=>'CANTN03',
                'product_name'=>'Tuna Kalengan 100gr',
                'product_stock'=>40,
                'price'=>15000,
            ],
            [//11
                'product_category'=>'Others',
                'product_code'=>'GLK600',
                'product_name'=>'Gulaku 600gr',
                'product_stock'=>400,
                'price'=>40000,
            ],
            [//12
                'product_category'=>'Snack',
                'product_code'=>'PILUSGRD004',
                'product_name'=>'Pilus Garuda BBQ',
                'product_stock'=>333,
                'price'=>15000,
            ],
            [//13
                'product_category'=>'Others',
                'product_code'=>'TLR0312',
                'product_name'=>'Telur Puyuh isi 12',
                'product_stock'=>60,
                'price'=>8999,
            ],
            [//14
                'product_category'=>'Food',
                'product_code'=>'SROTISW003',
                'product_name'=>'Sari Roti Sandwich Rasa Keju',
                'product_stock'=>230,
                'price'=>4500,
            ],
            [//15
                'product_category'=>'Drink',
                'product_code'=>'NULRG004',
                'product_name'=>'Nu Honey Tea Large',
                'product_stock'=>300,
                'price'=>12500,
            ],
            [//16
                'product_category'=>'Others',
                'product_code'=>'BNGSM01',
                'product_name'=>'Kecap Bango Small',
                'product_stock'=>456,
                'price'=>5400,
            ],
            [//17
                'product_category'=>'Food',
                'product_code'=>'SROTISBK001',
                'product_name'=>'Sari Roti Sobek Coklat',
                'product_stock'=>48,
                'price'=>10500,
            ],
            [//18
                'product_category'=>'Others',
                'product_code'=>'ABCSOS003',
                'product_name'=>'ABC Saos Sambal Bangkok',
                'product_stock'=>400,
                'price'=>13000,
            ],
            [//19
                'product_category'=>'Snack',
                'product_code'=>'TNGLRG003',
                'product_name'=>'Tango Large Vanila',
                'product_stock'=>302,
                'price'=>11400,
            ],
            [//20
                'product_category'=>'Drink',
                'product_code'=>'PCR450',
                'product_name'=>'Pocari Sweat 450ml',
                'product_stock'=>500,
                'price'=>12000,
            ]
        ]);
    }
}
