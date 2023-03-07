<?php

namespace App\Repository\Contracts;

use Illuminate\Support\Collection;

interface CategoryRepositoryInterface{

    public function getModel();

    public function findById(int $id);

    public function all() : Collection;

}
