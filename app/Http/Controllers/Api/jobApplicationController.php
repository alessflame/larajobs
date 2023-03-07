<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Response\CustomResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\JobAd;
use App\Models\jobApplication;
use App\Services\Contracts\JobApplicationServiceInterface;


class jobApplicationController extends Controller
{
    public function userJobsApplications(Request $request, JobApplicationServiceInterface $jobApplication)
    {
        $user = new UserResource($request->user());
        $applications = $jobApplication->getAll($user);
        if (!$applications["status"]) {
            // return throw new NotFoundHttpException("Candidatura non trovata");
            return CustomResponse::failResponse("non trovati", 404);
        };
        return CustomResponse::successResponse("trovati", 200, $applications);
    }

    public function show(int $id, Request $request, JobApplicationServiceInterface $jobApplicationService)
    {
        $user = new UserResource($request->user());


        $jobApplication = $jobApplicationService->getDetail($id, $user);
        if (!$jobApplication["status"]) {
            // return throw new NotFoundHttpException("Candidatura non trovata");
            return CustomResponse::failResponse("non trovato", 404);
        };

        return CustomResponse::successResponse("trovato", 200, $jobApplication);
    }

    public function store(Request $request, JobApplicationServiceInterface $jobApplicationService)
    {
        //  dd($request->all());
        $user = new UserResource($request->user());
        // dd($request->user_id);
        // if ($user->id === $request->user_id) {
        //     //confronto l'id dello user autenticato con lo user che effettua la richiesta(dal fronend)
        //     //controllo se esiste la candidatura
        //     $jobApplication = jobApplication::where("job_ads_id", $request->job_ads_id)->where("user_id", $user->id)->first();
        //     //controllo se l'annuncio al quale l'utente si candida è valido o inesistente
        //     $findJob = JobAd::where("id", $request->job_ads_id)->first();
        //     if ($findJob) {
        //         if (!$jobApplication) {
        //             $newJobApplication = jobApplication::create($request->all());
        //             return CustomResponse::successResponse("trovato", 200, $newJobApplication);
        //         }
        //         return CustomResponse::failResponse("gia candidato", 200);
        //     }
        //     return CustomResponse::failResponse("L'annuncio non esiste", 200);
        // }
        // return CustomResponse::failResponse("Qualcosa è andato storto", 200);


        $newJobApplication = $jobApplicationService->storeNewApplication($user, $request);
        return ($newJobApplication["status"] ?
            CustomResponse::successResponse("complimenti, ti sei candidato!", 200, $newJobApplication) :
            CustomResponse::failResponse($newJobApplication["errors"], 200));
    }

    public function destroy(Request $request, JobApplicationServiceInterface $jobApplicationService)
    {
        //  dd($request->all());
        $user = new UserResource($request->user());

        $newJobApplication = $jobApplicationService->deleteApplication($user, $request);

        return ($newJobApplication["status"] ?
            CustomResponse::successResponse("Hai annullato la candidatura!", 200, "") :
            CustomResponse::failResponse($newJobApplication["errors"], 200));
    }

}
