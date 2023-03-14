<?php

namespace App\Repository\Contracts;


interface CvRepositoryInterface{

    public function find($user);

    public function create($user, $name);

    public function delete($user);

}
