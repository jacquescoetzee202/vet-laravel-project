<?php

namespace Database\Factories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserGenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Owner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'telephone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->email,
            'address_1' => $this->faker->streetAddress,
            'address_2' => $this->faker->state,
            'town' => $this->faker->city,
            'postcode' => $this->faker->postcode
        ];
    }
}
