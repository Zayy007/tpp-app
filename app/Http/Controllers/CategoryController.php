<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->index();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $this->categoryRepository->store($request);

        return redirect()->route('categories.index');
    }


    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $category = $this->categoryRepository->show($request->id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->show($id);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
