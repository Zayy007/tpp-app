@extends('layouts.master')
@section('content')
    <div class="container">
        <h4 class="m-4">
            User List
        </h4>
        <a href="{{ route('users.create') }}" class="btn btn-outline-success mb-4">
            +Create
        </a>
        <table class="table table-bordered">
            <thead>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">Name</th>
                <th class="bg-primary text-white">Email</th>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr>
                        <th>{{$data['id']}}</th>
                        <th>{{ $data['name'] }}</th>
                        <th>{{ $data['email'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
