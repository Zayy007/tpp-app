@extends('layouts.master')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Create Product
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" class="form-control card-body" placeholder="Enter Product Name" />
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" class="form-control card-body"
                        placeholder="Enter Product Descripiton" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" class="form-control card-body" placeholder="Enter Product Price" />
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">IMAGE :</label>
                    <input type="file" name="image" class="form-control" id="image" />
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <label class="form-check-label">Active or Inactive</label>
                        <input class="form-check-input" name="status" type="checkbox" role="switch" checked />
                    </div>
                </div>
                <div class="card-body">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach ($category as $data)
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">+ Create</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
