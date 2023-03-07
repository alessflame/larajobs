<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return new Category();
    }

    public function findById(int $id)

    {
        return $this->getModel()->where("id", $id)->first();
    }

    public function all(): Collection
    {
        return $this->getModel()->all();
    }
}
