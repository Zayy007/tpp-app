<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $product = Product::with('category')->get();

        return $product;
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }

    public function store($data)
    {
        return Product::create($data);
    }
}

