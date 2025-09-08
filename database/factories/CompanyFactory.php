<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = \App\Models\Company::class;
   
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'reg_number' => strtoupper($this->faker->bothify('REG-####-??')),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'notes' => $this->faker->sentence,
        ];
    }
}
