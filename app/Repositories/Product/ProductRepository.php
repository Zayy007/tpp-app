<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $product = Product::all();

        return $product;
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }
}

