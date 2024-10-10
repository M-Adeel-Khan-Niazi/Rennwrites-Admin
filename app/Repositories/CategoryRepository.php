<?php

namespace App\Repositories;

use App\Contract\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::latest()->paginate(10);
    }

    public function find(Category $category)
    {
        return $category;
    }

    public function delete(Category $category)
    {
        $category->delete();
    }

    public function create(array $attributes)
    {
        return Category::create($attributes);
    }

    public function update(Category $category, array $attributes)
    {
        return $category->update($attributes);
    }
}
