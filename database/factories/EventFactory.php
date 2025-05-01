<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['EJC 1', 'EJC 2', 'EJC 3', 'EJC 4', 'EJC 5', 'EJC 6', 'EJC 7', 'EJC 8', 'EJC 9', 'EJC 10'];
        $name = $names[array_rand($names)];
        unset($names[$name]);

        $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        return [
            'name' => $name,
            'date_event' => $this->faker->date(),
            'entidade_id' => 1,
            'user_id' => 1,
            'uf' => $ufs[array_rand($ufs)],
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
        ];
    }
}
