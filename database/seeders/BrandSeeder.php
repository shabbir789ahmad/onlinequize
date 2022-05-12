<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Brand::insert([

          ['Brand_name'=>'samsung','brand_image'=>'icons8-samsung-480.png','vendor_id'=>'1'],

        ]);
        
    }
}
