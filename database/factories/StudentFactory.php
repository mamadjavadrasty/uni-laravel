<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->firstName,
            'last_name'=>$this->faker->lastName,
            'city'=>$this->faker->city,
            'student_number'=>$this->faker->numerify('##############'),
            'national_code'=>$this->faker->numerify('##########'),
            'vaccine'=>random_int(0,3),
            'request_dormitory'=>random_int(0,1)

        ];
    }
}
