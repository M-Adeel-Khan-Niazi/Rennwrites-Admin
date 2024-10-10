<?php

namespace App\Contract;

use App\Models\User;

interface UserRepositoryInterface
{
    public function all(String $role);
    public function find(User $user);
    public function delete(User $user);
    public function create(array $attributes);
    public function update(User $user, array $attributes);
}
