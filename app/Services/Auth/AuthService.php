<?php

namespace App\Services\Auth;

use App\Repository\Contracts\AuthRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Core\BaseService;

class AuthService extends BaseService implements AuthServiceInterface
{

    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = new $authRepository();
    }

    public function loginUser($email, $password)
    {
        $token = $this->authRepository->login($email, $password);
        if (!$token) {
            $this->status = false;
            return $this->parseResponse();
        }
        $this->response = $token;
        return $this->parseResponse();
    }
    public function registerUser($request)
    {
        $user = $this->authRepository->register($request);

        if (!$user) {
            $this->status = false;
            return $this->parseResponse();
        }
        return $this->parseResponse();
    }

    public function updateUser($request, $user)
    {
        $response = $this->authRepository->update($request, $user);

        if (!$response) {
            $this->status = false;
            return $this->parseResponse();
        }
        return $this->parseResponse();
    }

    public function logoutUser()
    {
        $this->authRepository->logout();
        return $this->parseResponse();
    }
}
