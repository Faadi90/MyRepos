<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Comment::factory(10)->create();

/*        for($i = 0; $i <= 10; $i++)

        {

        DB::table('comments')->insert([

                "employee_id" => rand(1,10),
                "name" => Str::random(10),
                "comment" => Str::random(20),
        ]);
        }
*/




    }
}
