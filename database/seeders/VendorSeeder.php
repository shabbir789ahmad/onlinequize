<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;
class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::insert([

               'vendor_name' => 'shabbir ahmad', 
                'vendor_email' => 'shabbir789shahid@gmail.com', 
               
                'password' => \Hash::make('password')

        ]);
    }
}
