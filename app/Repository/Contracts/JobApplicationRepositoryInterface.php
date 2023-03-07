<?php

namespace App\Repository\Contracts;

use Illuminate\Support\Collection;

interface JobApplicationRepositoryInterface{

    public function getModel();

    public function findById(int $id,$user);

    public function all($user);

    public function storeApplication($user, $request);

    public function destroyApplication($user, $request);
}
