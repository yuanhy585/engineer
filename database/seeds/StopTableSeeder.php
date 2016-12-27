<?php

use App\Stop;
use Illuminate\Database\Seeder;

class StopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stop::create([
            "name"=>"搬迁",
        ]);
        Stop::create([
            "name"=>"装修",
        ]);
        Stop::create([
            "name"=>"GSP认证",
        ]);
        Stop::create([
            "name"=>"文明城市检查",
        ]);
        Stop::create([
            "name"=>"等待执行单",
        ]);
        Stop::create([
            "name"=>"未与药店协商好",
        ]);
    }
}
