@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Create User
            </div>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"/>
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email"/>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter Password"/>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Password Confirmation"/>
                    </div>

                    <div class="form-group">
                        <label for="role">Roles</label>
                        <select name="roles[]" id="" class="form-select select">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">+ Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
