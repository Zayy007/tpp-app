<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    {{-- {{ dd($category->id) }} --}}
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                Edit Category
            </div>
        </div>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <input type="text" name="name" class="form-control card-body p-3" value="{{ $category->name }}"/>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Back</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
