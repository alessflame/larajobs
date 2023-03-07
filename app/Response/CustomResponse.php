<?php

namespace App\Response;

class CustomResponse
{

    public static function failResponse($message, $code)
    {
        $response = CustomResponse::getResponse(false, $message, $code);

        return response()->json($response, $code);
    }

    public static function successResponse($message, $code, $data = null)
    {
        $response = CustomResponse::getResponse(true, $message, $code);

        if ($data !== null) {
            $response["data"] = $data;
        };

        return response()->json($response, $code);
    }



    public static function getResponse($success, $message, $code)
    {
        return [
            "success" => $success,
            "status_code" => $code,
            "message" => $message,
        ];
    }
}
