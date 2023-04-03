<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i=0; $i < 10; $i++) { 

        DB::table('employees')->insert([

            "company_id" => rand(1,3),
            "name" => Str::random(10),
            "email" => Str::random(10).'@gmail.com',
        ]);
            
        }


    }
}
