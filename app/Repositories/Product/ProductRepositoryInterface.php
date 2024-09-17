<?php

namespace App\Repositories\Product;

use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function index();

    public function show($id);

    public function store($data);

}
