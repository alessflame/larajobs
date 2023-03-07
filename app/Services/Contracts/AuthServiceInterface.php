<?php

namespace App\Services\Contracts;


interface AuthServiceInterface{

    public function loginUser($email, $password);
    public function registerUser($request);
    public function updateUser($request, $user);
    public function logoutUser();

}
