<?php

namespace App\Services\Category;

use App\Http\Resources\CategoryResource;
use App\Repository\Contracts\CategoryRepositoryInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Core\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface
{

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = new $categoryRepository();
    }

    public function getAll()
    {
        $categories = $this->categoryRepository->all();

        $this->response = CategoryResource::collection($categories);

        return $this->parseResponse();
    }

    public function showCategory(int $id)
    {
        $category = $this->categoryRepository->findByid($id);
        if (!$category) {
            $this->status = false;
        } else {
            $this->response = new CategoryResource($category);
        }

        return $this->parseResponse();
    }
}
