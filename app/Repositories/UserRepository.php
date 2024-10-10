<?php

namespace App\Repositories;

use App\Contract\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function all(String $role)
    {
        return User::whereHas('userRole', function ($q) use ($role) {
            $q->where('role', $role);
        })->latest()->paginate(10);
    }

    public function find(User $user)
    {
        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function create(array $attributes)
    {
        $data = array_merge($attributes, [
            'password' => Hash::make($attributes['password']),
        ]);
        return User::create($data);
    }

    public function update(User $user, array $attributes)
    {
        return $user->update($attributes);
    }
}
