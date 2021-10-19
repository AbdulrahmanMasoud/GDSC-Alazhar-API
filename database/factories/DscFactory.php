<?php

namespace Database\Factories;

use App\Models\Dsc;
use Illuminate\Database\Eloquent\Factories\Factory;

class DscFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dsc::class;

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
            'logo' => $this->faker->imageUrl(100,100),
        ];
    }
}
