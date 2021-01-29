<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        $prep = random_int(1,90);
        $cook = random_int(1,90);
        $total = $prep + $cook;
        return array(
            'name' => $this->faker->words(3, true),
            'user_id' => 1,
            'description' => $this->faker->paragraph,
            'instructions' => $this->faker->paragraph,
            'prep_time' => $prep,
            'cook_time' => $cook,
            'total_time' => $total,
            'difficulty' => $this->faker->randomElement(collect(Recipe::DIFFICULTY)->keys()),
        );
    }
}
