<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(ShopLevelTableSeeder::class);
        $this->call(ChannelTableSeeder::class);

    }

}
