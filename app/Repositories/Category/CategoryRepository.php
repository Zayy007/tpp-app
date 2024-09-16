<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $category = Category::get();

        return $category;
    }

    public function store(Request $request)
    {
        return Category::create([
            'name' => $request->name,
        ]);

    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return $category;
    }
}
