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
                Create User
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"
                            value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <select name="roles[]" class="form-select select">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"{{ $user->roles->contains($role->id) ? 'selected' : "" }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
