<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repository\Contracts\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{

    public function login($email, $password)
    {
        $token = auth()->attempt(["email" => $email, "password" => $password]);

        return $token;
    }

    public function update($request, $user)
    {

        $response= DB::table('users')->where("id", $user->id)->update([
            "email" => $request["email"],
            "password" => Hash::make($request["password"]),
            "isCompany" => false
        ]);
        return $response;


    }

    public function register($request)
    {
        $user = User::create([
            "email" => $request["email"],
            "name" => $request["name"],
            "password" => Hash::make($request["password"]),
            "isCompany" => false
        ]);

        return $user;
    }


    public function logout()
    {
        auth()->logout();
    }
}
