<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            "name"=>"KA",
        ]);
        Channel::create([
            "name"=>"非KA",
        ]);
    }
}
