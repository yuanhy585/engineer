<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'title'=>'销售部',
        ]);

        Department::create([
            'title'=>'管理部',
        ]);

        Department::create([
            'title'=>'市场部',
        ]);

        Department::create([
            'title'=>'工程部',
        ]);

        Department::create([
            'title'=>'项目部',
        ]);
    }
}
