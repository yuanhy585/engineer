<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            "name"=>"RT-CT",
        ]);
        Region::create([
            "name"=>"RT-E1",
        ]);
        Region::create([
            "name"=>"RT-E2",
        ]);
        Region::create([
            "name"=>"RT-NT",
        ]);
        Region::create([
            "name"=>"RT-NW",
        ]);
        Region::create([
            "name"=>"RT-ST",
        ]);
        Region::create([
            "name"=>"RT-SW",
        ]);
    }
}
