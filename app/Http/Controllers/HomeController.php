<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Serie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category', 'brand', 'serie', 'user')
            ->inRandomOrder()
            ->take()
            ->get();

        $categories = Category::withCount('products')
            ->orderBy('name')
            ->get();

        $brands = Brand::with('series')
            ->withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        return [
            'products' =>$products,
            'categories' => $categories,
            'brands' => $brands,
        ];
    }
}
