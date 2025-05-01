<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MembersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ufs = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];

        return [
            'name' => $this->faker->name(),
            'event' => 1,
            'status' => rand(1, 6),
            'surname' => $this->faker->lastName(),
            'entidade_id' => 1,
            'sex' => $this->faker->randomElement(['M', 'F']),
            'type' => rand(1, 2),
            'telephone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
            'uf' => $ufs[array_rand($ufs)],
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'batizado' => rand(1, 2),
            'crismado' => rand(1, 2),
            'observation' => $this->faker->text(),
            'user_id' => 1,
        ];
    }
}
