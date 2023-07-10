<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sex = $this->faker->randomElement(['male', 'female']);
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress()
        ];
    }
}
