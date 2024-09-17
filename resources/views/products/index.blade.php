@extends('layouts.master')
@section('content')
    <div class="container">
        <h4 class="m-4">
            Product List
        </h4>
        @can('productCreate')
            <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4">
                + Create
            </a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <th class="bg-primary text-white" scope="col">ID</th>
                <th class="bg-primary text-white" scope="col">NAME</th>
                <th class="bg-primary text-white" scope="col">DESCRIPTION</th>
                <th class="bg-primary text-white" scope="col">PRICE</th>
                <th class="bg-primary text-white" scope="col">IMAGE</th>
                <th class="bg-primary text-white" scope="col">STATUS</th>
                <th class="bg-primary text-white" scope="col">CATEGORY</th>
                <th class="bg-primary text-white" scope="col">ACTION</th>
            </thead>
            <tbody>
                @foreach ($product as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>{{ $data['description'] }}</th>
                        <th>{{ $data['price'] }}</th>
                        <th>
                            <img src="{{ asset('productImages/' . $data->image) }}" alt="{{ $data->image }}"
                                style="width: 70px; height:70px" />
                        </th>
                        <th>
                            @if ($data->status === 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Suspend</span>
                            @endif
                        </th>
                        <th>
                            {{ $data['category']['name'] }}
                        </th>
                        <th class="d-flex">
                            <a href="{{ route('products.edit', ['id' => $data->id]) }}"
                                class="btn btn-outline-secondary me-2">Edit</a>
                            <form action="{{ route('products.delete', $data->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
