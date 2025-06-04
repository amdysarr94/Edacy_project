<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'nom_entreprise' => $this->faker->company,
            'secteur_activite' => $this->faker->word,
            'email_entreprise' => $this->faker->companyEmail,
            'telephone_entreprise' => $this->faker->phoneNumber,
            'adresse_entreprise' => $this->faker->address,
        ];
    }
}
