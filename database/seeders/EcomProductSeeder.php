<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EcomProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('ecom_products')->insert(
                [
                    'productName' => Str::random(8),
                    'categoryId' => '14',
                    'sku' => 'BST-'.rand(1,300),
                    'image' => 'photos/YxuWvtr6fbG8w3t8eD2X3YvWZsHqv7Dt32797JuZ.jpg',
                    'regularPrice' => '120',
                    'price' => '100',
                    'stock' => '10',
                    'description' => 'It is a long  by the readable content of web sites still in their infancy. Various versions have evolved ',
                ]       
            );
        }

    }
}
