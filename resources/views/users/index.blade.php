@extends('layouts.master')
@section('content')
    <div class="container">
        <h4 class="m-4">User List</h4>
        <a href="{{ route('users.create') }}" class="btn btn-outline-success mb-4">
            + Create
        </a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-primary text-white" scope="col">ID</th>
                    <th class="bg-primary text-white" scope="col">Name</th>
                    <th class="bg-primary text-white" scope="col">Email</th>
                    <th class="bg-primary text-white" scope="col">Role</th>
                    <th class="bg-primary text-white" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>{{ $data['email'] }}</th>
                        <th>
                            @foreach ($data->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </th>
                        <th class="d-flex">
                            <a href="{{ route('users.edit', ['user' => $data->id]) }}"
                                class="btn btn-outline-secondary me-2">Edit</a>
                            <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
