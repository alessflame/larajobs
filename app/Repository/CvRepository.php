<?php

namespace App\Repository;

use App\Models\Cv;
use App\Repository\Contracts\CvRepositoryInterface;

class CvRepository implements CvRepositoryInterface
{

    public function getModel()
    {
        return new Cv();
    }

    public function find($user)
    {
        return $this->getModel()->where("user_id", $user)->first();
    }

    public function create($user, $path)
    {
        return $this->getModel()->create(["filename" => explode("/", $path)[1], "user_id" => $user]);

    }

    public function delete($user){
        return $this->getModel()->where("user_id", $user)->delete();
    }
}
