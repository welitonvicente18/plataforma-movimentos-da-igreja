<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventTeam>
 */
class EventTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['Cozinha', 'Ordem', 'Sala', 'Cafezinho', 'Externa', 'Garçons', 'Liturgia', 'Liturgia Externa', 'G5'];
        $name = $names[array_rand($names)];
        unset($names[$name]);

        return [
            'name' => $name,
            'entidade_id' => 1,
            'user_id' => 1,
        ];
    }
}
