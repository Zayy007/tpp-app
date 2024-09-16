<?php

namespace App\Repositories\Category;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function index();

    public function store(Request $request);

    public function show($id);
}
