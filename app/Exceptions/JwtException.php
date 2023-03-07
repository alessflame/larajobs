<?php

namespace App\Exceptions;

use App\Response\CustomResponse;
use Exception;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtException extends Exception
{
    public function register($e)
    {
            if($e instanceof TokenInvalidException){
                return CustomResponse::failResponse("Token non valido",401);
            }else if($e instanceof TokenExpiredException){
                return CustomResponse::failResponse("Token scaduto",401);
            }
            else{
                return CustomResponse::failResponse("Token errato",401);
            };

    }

}
