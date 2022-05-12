<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SUbCategory;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         SUbCategory::insert([

          ['sub_category_name'=>'samsung','sub_category_image'=>'icons8-samsung-480.png','category_id'=>'1','vendor_id'=>'1'],

        ]);
    }
}
