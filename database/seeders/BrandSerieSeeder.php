<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Series;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'ACER', 'series' => []],
            ['name' => 'ASUS', 'series' => ['TUF', 'ROG']],
            ['name' => 'MSI', 'series' => []],
            ['name' => 'DELL', 'series' => []],
            ['name' => 'LENOVO', 'series' => []],
            ['name' => 'HP', 'series' => []],
        ];

        foreach ($brands as $brand) {
            $obj = Brand::create([
                'name' => $brand['name'],
                'slug' => str($brand['name'])->slug(),
            ]);

            foreach ($brand['series'] as $series) {
                Series::create([
                    'brand_id' => $obj->id,
                    'name' => $series,
                    'slug' => str($series)->slug(),
                ]);
            }
        }
    }
}
