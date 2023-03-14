<?php

namespace App\Http\Controllers\Api;

use App\Models\Cv;
use Illuminate\Http\Request;
use App\Response\CustomResponse;
use App\Http\Controllers\Controller;
use App\Services\Contracts\CvServiceInterface;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{

    public function show(Request $request, CvServiceInterface $cvService)
    {
        $user = $request->user()->id;
        $response = $cvService->showCv($user);
        if ($response["status"]) return CustomResponse::successResponse("", 200, $response);
        return CustomResponse::failResponse("", 200);
    }
    public function store(Request $request, CvServiceInterface $cvService)
    {

        $userId = $request->user()->id;
        $response = $cvService->createCv($request, $userId);

        if ($response["status"]) {
            return CustomResponse::successResponse("Cv inserito con successo!", 201, $response["data"]);
        }
        return CustomResponse::failResponse("Qualcosa è andato storto!", 300);
    }

    public function destroy(Request $request, CvServiceInterface $cvService )
    {
            $user= $request->user()->id;
            $response=  $cvService->deleteCv($user);

           if($response["status"]) return CustomResponse::successResponse("File eliminato con successo!", 200);
           return CustomResponse::failResponse("Errore durante l'eliminazione", 200);
    }
}
