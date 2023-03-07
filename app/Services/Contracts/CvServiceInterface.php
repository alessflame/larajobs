<?php

namespace App\Services\Contracts;


interface CvServiceInterface {

    public function showCv($user);
    public function createCv($request, $user);
    public function deleteCv($user);


}
