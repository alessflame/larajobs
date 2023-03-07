<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Response\CustomResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Contracts\AuthServiceInterface;

class UserController extends Controller
{
    public function update(RegisterRequest $request, AuthServiceInterface $authService)
    {
        $user= new UserResource($request->user());

        dd($user);

        // $response= $authService->registerUser($request);
        // if (!$response["status"]) {
        //     return CustomResponse::failResponse("Errore durante la registrazione", 400);
        // }
        // return CustomResponse::successResponse("Registrato con successo", 201);
    }
}
