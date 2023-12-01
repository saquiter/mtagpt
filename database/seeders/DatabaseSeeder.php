<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AIModelSeeder::class,
            PromptsFolderSeeder::class,
            RoleSeeder::class,
            LanguageSeeder::class,
            PromptsSeeder::class,
            PartnerSeeder::class,
            TestPromocodeSeeder::class,
        ]);
    }
}
