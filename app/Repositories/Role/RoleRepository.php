<?php

namespace App\Repositories\Role;

use App\Repositories\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function index()
    {
        return Role::get();
    }

    public function show($id)
    {
        return Role::where('id', $id)->first();

    }
}
