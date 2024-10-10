<?php

namespace App\Contract;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();
    public function find(Category $category);
    public function delete(Category $category);
    public function create(array $attributes);
    public function update(Category $category, array $attributes);
}
