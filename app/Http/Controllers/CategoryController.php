<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {

        $category = Category::where('id', $id)->first();

        $category->delete();

        return redirect()->route('categories.index');
    }
}
