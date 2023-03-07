<?php
namespace App\Repository\Contracts;


interface AuthRepositoryInterface{

    public function login($email,$password);
    public function register($request);
    public function update($request, $user);
    public function logout();


}
