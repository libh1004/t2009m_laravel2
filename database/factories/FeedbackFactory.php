<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feedback::class;

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
            "feedback"=>$this->faker->text
        ];
    }
}
