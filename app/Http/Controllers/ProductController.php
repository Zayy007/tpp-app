<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return view('products.index', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'description' => 'required|string',
        //     'price' => 'required|integer',
        //     'status' => 'nullable',
        // ]);

        // $validatedData['status'] = $request->has('status') ? true : false;

        // Product::create($validatedData);

        $request->validated();

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status == 'on' ? true : false,
        ]);


        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $product = Product::where('id', $request->id)->first();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status == 'on' ? 1 : 0,
        ]);

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();

        $product->delete();

        return redirect()->route('products.index');
    }
}
