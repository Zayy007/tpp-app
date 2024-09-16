<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->middleware('auth');

        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $product = $this->productRepository->index();

        return view('products.index', compact('product'));
    }

    public function create()
    {
        $category = Category::all();

        return view('products.create', compact('category'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $data['status'] = $request->has('status') ? true : false;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);
            // $request->image->storeAs('productImages/', $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }
        Product::create($data);

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->productRepository->show($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $product = $this->productRepository->show($request->id);

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
        $product = $this->productRepository->show($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
