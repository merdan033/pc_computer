<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::with(['series' => function ($query) {
            $query->withCount('products');
            $query->orderBy('products_count', 'desc');
        }])
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        $discounts = Product::where('discount_percent', '>', 0)
            ->with('category', 'brand', 'series', 'user')
            ->inRandomOrder()
            ->take(12)
            ->get();



        return view('home.index')
            ->with([
                'brands' => $brands,
                'discounts' => $discounts,
            ]);
    }
}
