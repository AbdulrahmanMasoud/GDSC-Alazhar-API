<?php

namespace Database\Factories;

use App\Models\Courses;
use App\Models\Tracks;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Courses::class;

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
            'track_id' => Tracks::get(['id'])->random()->id,
            'instractor_id' => User::get(['id'])->random()->id,
        ];
    }
}
