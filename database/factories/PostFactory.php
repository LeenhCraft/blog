<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'pos_name' => $name,
            'pos_slug' => Str::slug($name),
            'pos_extract' => $this->faker->text(250),
            'pos_body' => $this->faker->text(2000),
            'pos_status' => $this->faker->randomElement(['0', '1']),
            'user_id' => User::all()->random()->id,
            'idcategorie' => Category::all()->random()->idcategorie,
        ];
    }
}
