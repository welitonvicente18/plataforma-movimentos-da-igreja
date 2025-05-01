<?php

namespace Database\Seeders;

use App\Models\Members;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Members::factory(150)->create();
    }
}
