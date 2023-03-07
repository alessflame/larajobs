<?php

namespace App\Http\Controllers\Api;

use App\Models\JobAd;
use Illuminate\Http\Request;
use App\Response\CustomResponse;
use Illuminate\Support\Facades\DB;
use App\Repository\JobAdRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Contracts\JobAdServiceInterface;
use App\Repository\Contracts\JobAdRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JobAdController extends Controller
{
    public function index(Request $request,JobAdServiceInterface $jobAdService)
    {
        $user = new UserResource($request->user());
        $response = $jobAdService->getAll($user);

        // return response()->json($response);

        return CustomResponse::successResponse("trovati", 200, $response["data"]);

    }

    public function show(int $id,JobAdServiceInterface $jobAdService, Request $request,)
    {
        $user = new UserResource($request->user());
        $singleJobAd= $jobAdService->getDetail($id, $user);

        if($singleJobAd["status"]==false){
            return throw new NotFoundHttpException("Annuncio non trovato");
        }

        // $singleJobAd->category;
        // $singleJobAd->user;

        return CustomResponse::successResponse("trovato",200,$singleJobAd);
    }


    public function someJobs(){
        $jobs= DB::table("job_ads")->limit(10)->get();

        return $jobs;
    }
}
