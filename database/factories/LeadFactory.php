<?php

namespace Database\Factories;

use App\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName($gender = null|'male'|'female'),
            'last_name' => $this->faker->lastName,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
        ];
    }
}
