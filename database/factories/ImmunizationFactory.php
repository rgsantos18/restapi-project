<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImmunizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $vaccines = $this->faker->randomElement(['Astra','Sinovac','Pfizer']);

        return [
            'patient_id' => Patient::factory(),
            'vaccines' => $vaccines,
            'administered_by' => $this->faker->name(),
            'date_administered' => $this->faker->dateTimeThisDecade(),
            'lot_number' => $this->faker->randomNumber(5),
            'date_next_dose' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
