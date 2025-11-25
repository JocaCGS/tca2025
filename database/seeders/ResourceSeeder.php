<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        // post
        ["name" => "post.index"], // 1
        ["name" => "post.create"], // 2
        ["name" => "post.show"], // 3
        ["name" => "post.edit"], // 4
        ["name" => "post.delete"], // 5
        // user
        ["name" => "user.index"], // 6
        ["name" => "user.create"], // 7
        ["name" => "user.show"], // 8
        ["name" => "user.edit"], // 9
        ["name" => "user.delete"], // 10
        ];
        DB::table('resources')->insert($data);
    }
}
