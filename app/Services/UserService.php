<?php

namespace App\Services;

use App\Contract\UserRepositoryInterface;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }

    public function all($role)
    {
        return $this->userRepository->all($role);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }
}
