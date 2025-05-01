<?php

namespace Database\Seeders;

use App\Models\Entidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entidade::factory()->create([
            'name' => "EJC Ipê",
            'uf' => 'GO',
            'city' => "Luziânia",
            'paroquia' => 'Nossa Senhra de Guadalupe',
            'address' => 'Rua 1, Qd 1, Lt 1',
        ]);

//        Entidade::factory(2)->create();
    }
}
