<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->get();

        $brands = Brand::with(['series' => function ($query) {
            $query->withCount('products');
        }])
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return [
            'categories' => $categories,
            'brands' => $brands,
        ];
    }
}
