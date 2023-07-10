<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory()
            ->count(25)
            ->hasImmunizations(15)
            ->create();
        
        Patient::factory()
            ->count(50)
            ->hasImmunizations(25)
            ->create();
    }
}
