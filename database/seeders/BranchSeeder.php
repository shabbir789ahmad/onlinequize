<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;
class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::insert([

          [
            'name'=>'raiwind',
            'email'=>'shabbir789shahid@gmail.com',
            'password'=>'123456',
            'vendor_id'=>'1',
        ],

        ]);
    }
}
