<?php

use App\ShopLevel;
use Illuminate\Database\Seeder;

class ShopLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopLevel::create([
            "name"=>"A",
        ]);
        ShopLevel::create([
            "name"=>"B",
        ]);
        ShopLevel::create([
            "name"=>"C",
        ]);
        ShopLevel::create([
            "name"=>"D",
        ]);
        ShopLevel::create([
            "name"=>"I",
        ]);
        ShopLevel::create([
            "name"=>"暂无",
        ]);
    }
}
