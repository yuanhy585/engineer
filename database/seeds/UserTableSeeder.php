<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Jack',
            'email'=>'222@163.com',
            'role_id'=>'1',
            'department_id'=>'1',
            'password'=>bcrypt('123456'),
            'language_id'=>'1'
        ]);
    }
}
