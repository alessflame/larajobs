<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Response\CustomResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;
// use App\Http\Resources\PrivateUserResource;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Services\Contracts\AuthServiceInterface;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthServiceInterface $authService)
    {
        $response = $authService->loginUser($request->email, $request->password);
        if (!$response["data"]) {
            return CustomResponse::failResponse("Autenticazione fallita", 400);
        }
        return CustomResponse::successResponse("Autenticazione effettuata con successo", 200, $response["data"]);
    }
    public function register(RegisterRequest $request, AuthServiceInterface $authService)
    {
        $response = $authService->registerUser($request);
        if (!$response["status"]) {
            return CustomResponse::failResponse("Errore durante la registrazione", 400);
        }
        return CustomResponse::successResponse("Registrato con successo", 201);
    }

    public function update(UpdateUserRequest $request, AuthServiceInterface $authService)
    {

        $user = new UserResource($request->user());
        $response = $authService->updateUser($request, $user);
        if (!$response["status"]) {
        return CustomResponse::failResponse("Errore durante la modifica: assicurati di aver compilato correttamente", 400);
        }
        return CustomResponse::successResponse("Modificato con successo", 201);
    }

    public function me(Request $request)
    {
        $response = new UserResource($request->user());
        return CustomResponse::successResponse("", 200, $response);
    }

    public function logout(AuthServiceInterface $authService)
    {
        $authService->logoutUser();
        return CustomResponse::successResponse("Logout effettuato con successo", 200, []);
    }
}
