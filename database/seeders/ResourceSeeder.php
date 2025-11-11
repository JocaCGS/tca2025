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
        // CURSO
        ["name" => "curso.index"], // 1
        ["name" => "curso.create"], // 2
        ["name" => "curso.show"], // 3
        ["name" => "curso.edit"], // 4
        ["name" => "curso.delete"], // 5
        // ALUNO
        ["name" => "aluno.index"], // 6
        ["name" => "aluno.create"], // 7
        ["name" => "aluno.show"], // 8
        ["name" => "aluno.edit"], // 9
        ["name" => "aluno.delete"], // 10
        ];
        DB::table('resources')->insert($data);
    }
}
