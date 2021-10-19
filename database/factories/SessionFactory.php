<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1),
            'bio' => $this->faker->sentence(5),
            'cover' => $this->faker->imageUrl(300,300),
            'session' => $this->faker->url(),
            'course_id' => Courses::get(['id'])->random()->id,
        ];
    }
}
