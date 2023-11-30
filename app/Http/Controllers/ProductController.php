<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'user' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'serie' => 'nullable|string|max:255',

        ]);
        $f_user = $request->has('user') ? $request->user : null;
        $f_category = $request->has('category') ? $request->category : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_serie = $request->has('serie') ? $request->serie : null;


        $products = Product::when(isset($f_user), function ($query) use ($f_user) {
            $query->whereHas('user', function ($query) use ($f_user) {
                $query->where('username', $f_user);
            });
        })
            ->when(isset($f_category), function ($query) use ($f_category) {
                $query->whereHas('category', function ($query) use ($f_category) {
                    $query->where('slug', $f_category);
                });
            })

            ->when(isset($f_brand), function ($query) use ($f_brand) {
                $query->whereHas('brand', function ($query) use ($f_brand) {
                    $query->where('slug', $f_brand);
                });
            })
            ->when(isset($f_serie), function ($query) use ($f_serie) {
                $query->whereHas('serie', function ($query) use ($f_serie) {
                    $query->where('slug', $f_serie);
            });
        })
            ->with('category', 'brand', 'serie', 'user')
            ->orderBy('id')
            ->paginate(20)
            ->withQueryString();

        $users = User::orderBy('name')
            ->get();

        $categories = Category::orderBy('name')
            ->get();

        $brands = Brand::with('series')
            ->orderBy('name')
            ->get();

        return view('products.index')
            ->with([
                'users' => $users,
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands,
                'f_category' => $f_category,
                'f_brand' => $f_brand,
                'f_serie' => $f_serie,
                'f_user' => $f_user,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show')
            ->with([
                'product' => $product,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
