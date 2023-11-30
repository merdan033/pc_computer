<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'category' => 'nullable|string|max:255',
        ]);

        $f_category = $request->category ?: null;

        $products = Product::when(isset($f_category), function ($query) use ($f_category) {
            $query->whereHas('category', function ($query) use ($f_category) {
                $query->where('slug', $f_category);
            });
        })
            ->with('category', 'brand', 'serie', 'user')
            ->orderBy('id')
            ->paginate(18);

        return view('products.index')
            ->with([
                'products' => $products,
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
