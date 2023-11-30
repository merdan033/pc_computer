<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = DB::table('users')->inRandomOrder()->first();
        $category = DB::table('categories')->inRandomOrder()->first();
        $brand = DB::table('brands')->inRandomOrder()->first();
        $serie = DB::table('series')->inRandomOrder()->first();
        $name = fake()->unique()->streetName();
        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'serie_id' => $serie->id,
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->paragraph(rand(3, 5)),
            'price' => fake()->randomFloat(2, 4, 30) * 1000 - 1,
            'discount_percent' =>fake()->randomNumber(2),
        ];
    }
}
