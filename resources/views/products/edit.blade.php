@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Edit Product
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" class="form-control card-body" placeholder="Enter Product Name"
                        value="{{ $product->name }}" />
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" class="form-control card-body"
                        placeholder="Enter Product Descripiton" value="{{ $product->description }}" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" class="form-control card-body" placeholder="Enter Product Price"
                        value="{{ $product->price }}" />
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">Image :</label>
                    <img src="{{ asset('/productImages/' . $product->image) }}" alt="{{ $product->image }}"
                        style="width: 70px; height:70px" />
                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <label for="status" class="form-check-label">Active Or Inactive</label>
                        <input type="checkbox" class="form-check-input" name="status" role="switch"
                            {{ $product->status === 1 ? 'checked' : '' }} />
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
