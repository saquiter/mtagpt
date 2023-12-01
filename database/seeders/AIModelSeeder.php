<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AIModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ai_models')->insert([
            'title' => "gpt-3.5-turbo",
            "disabled"=> false
        ]);
        DB::table('ai_models')->insert([
            'title' => "gpt-3.5-turbo-301",
            "disabled"=> false
        ]);
        DB::table('ai_models')->insert([
            'title' => "gpt-4",
            "disabled"=> true
        ]);
        DB::table('ai_models')->insert([
            'title' => "gpt-4-0314",
            "disabled"=> true
        ]);
    }
}
