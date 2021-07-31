<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "student_name"=>$this->faker->name(),
            "student_email"=>$this->faker->unique()->email,
            "student_telephone"=>$this->faker->unique()->phoneNumber,
            "feedback"=>""
        ];

    }
}
