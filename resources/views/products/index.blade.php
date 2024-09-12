<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h4 class="m-4">
            Product List
    </h4>
        <a href="{{ route('products.create') }}" class="btn btn-outline-success mb-4">
            + Create
        </a>
        <table class="table table-bordered">
            <thead>
                <th class="bg-primary text-white" scope="col">ID</th>
                <th class="bg-primary text-white" scope="col">NAME</th>
                <th class="bg-primary text-white" scope="col">DESCRIPTION</th>
                <th class="bg-primary text-white" scope="col">PRICE</th>
                <th class="bg-primary text-white" scope="col">IMAGE</th>
                <th class="bg-primary text-white" scope="col">STATUS</th>
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
                            <img src="{{ asset('productImages/' . $data->image) }}" alt="{{ $data->image }}" style="width: 70px; height:70px"/>
                            {{-- <img src="{{ asset('storage/productImages/' . $data->image) }}" alt="{{ $data->image }}" style="width: 70px; height:70px" /> --}}
                        </th>
                        <th>
                            @if ($data->status === 1)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Suspend</span>
                            @endif
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
