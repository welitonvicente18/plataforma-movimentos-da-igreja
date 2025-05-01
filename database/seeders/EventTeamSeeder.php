<?php

namespace Database\Seeders;

use App\Models\EventTeam;
use Illuminate\Database\Seeder;

class EventTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventTeam::factory(8)->create();
    }
}
