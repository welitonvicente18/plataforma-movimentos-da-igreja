<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                EntidadeSeeder::class,
                UserSeeder::class,
                MemberSeeder::class,
                EventSeeder::class,
                EventTeamSeeder::class,
            ]
        );
    }
}
