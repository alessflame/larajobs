<?php

namespace App\Services\Contracts;


interface JobApplicationServiceInterface
{

    public function getDetail(int $id, $user);
    public function getAll($user);
    public function storeNewApplication($user, $request);
    public function deleteApplication($user, $request);
}
