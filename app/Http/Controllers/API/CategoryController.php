<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoryRepository->index();

        return $this->success($data, 'Categories Retrieved Successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        return $this->success($category, 'Category Created Successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->categoryRepository->show($id);

        if (!$data) {
            return $this->error('Category Not Found!', null, 404);
        }

        return $this->success($data, 'Category Show Successfully', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error('Validation Error', $validator->errors(), 422);
        }

        $category = $this->categoryRepository->show($id);

        if(!$category) {
            return $this->error("Category Not Found!", null, 404);
        }

        $category->update($request->all());

        return $this->success($category, 'Category Updated Successully', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categoryRepository->show($id);

        if (!$category) {
            return $this->error("Category Not Found!", null, 404);
        }

        $category->delete();

        return $this->success($category, 'Category Destory Successfully', 200);
    }
}
