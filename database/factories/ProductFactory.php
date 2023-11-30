<?php

namespace Database\Factories;


use App\Models\Brand;
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
        $brand = Brand::inRandomOrder()->with('series')->first();
        $name = fake()->unique()->streetName();
        return [
            'user_id' => $user->id,
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'series_id' => $brand->series->count() > 0 ? $brand->series->random()->id : null,
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->paragraph(rand(3, 5)),
            'price' => fake()->randomFloat(2, 4, 30) * 1000 - 1,
            'discount_percent' =>rand(0, 1) ? fake()->randomNumber(2) : 0,
            'created_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
