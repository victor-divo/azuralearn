<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sku_code' => 'required',
            'name' => 'required',
            'price' => 'numeric',
            'stock' => 'numeric',
        ]);

        $product = Product::create($validated);
        return redirect()->route('products.create')->with('status', 'Produk ' . $product->name . ' berhasil dibuat');
    }
}
