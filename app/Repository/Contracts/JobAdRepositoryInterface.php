<?php

namespace App\Repository\Contracts;

use Illuminate\Support\Collection;

interface JobAdRepositoryInterface{

    public function getModel();

    public function findById(int $id, $user);

    public function all($user);

}
