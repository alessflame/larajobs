<?php

namespace App\Services\Contracts;


interface JobAdServiceInterface {

    public function getDetail(int $id, $user);
    public function getAll($user);

}
