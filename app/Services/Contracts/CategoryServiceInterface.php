<?php

namespace App\Services\Contracts;


interface CategoryServiceInterface {

    public function showCategory(int $id);
    public function getAll();

}
