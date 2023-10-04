<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(5),
            'category_id'=>$this->faker->numberBetween(1,2),
            'image'=>'https://picsum.photos/200/300',
            's_price'=>$this->faker->numberBetween(50,65),
            'm_price'=>$this->faker->numberBetween(70,85),
            'l_price'=>$this->faker->numberBetween(90,150),
            'description'=>$this->faker->text(150),
        ];
    }
}
