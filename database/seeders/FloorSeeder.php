<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('floors')->insert([
            ['floor_number' => '1stFloor'],
            ['floor_number' => '2ndFloor'],
            ['floor_number' => '3rdFloor']
        ]);
    }
}
