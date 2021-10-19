<?php

namespace Database\Factories;

use App\Models\Committe;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommitteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Committe::class;

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
            'cover' => $this->faker->imageUrl(300,300)
        ];
    }
}
