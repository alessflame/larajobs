<?php

namespace App\Repository;

use App\Models\JobAd;
use App\Models\Category;
use App\Models\jobApplication;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\JobApplicationResource;
use App\Repository\Contracts\JobApplicationRepositoryInterface;

class JobApplicationRepository implements JobApplicationRepositoryInterface
{

    public function getModel()
    {
        return new jobApplication();
    }

    public function findById(int $id, $user)
    {
        $jobApplication = jobApplication::where("id", $id)->where("user_id", $user->id)->first();
        if (!$jobApplication) {
            return false;
        };

        return new JobApplicationResource($jobApplication);
    }

    public function all($user)
    {
        $applications = JobApplicationResource::collection($user->jobApplications);
        if (!$applications) {
            return false;
        };

        return $applications;
    }

    public function storeApplication($user, $request)
    {
        //controllo se esiste la candidatura
        $jobApplication = jobApplication::where("job_ads_id", $request->job_ads_id)->where("user_id", $user->id)->first();
        //controllo se l'annuncio al quale l'utente si candida è valido o inesistente
        $findJob = JobAd::where("id", $request->job_ads_id)->first();
        if ($findJob) {
            if (!$jobApplication) {
                $newJobApplication = jobApplication::create($request->all());
                return $newJobApplication;
            }
            return false;
        }
        return false;
    }

    public function destroyApplication($user, $request)
    {

        if (jobApplication::where('id', $request->id)->delete())return true;

        return false;
    }
}
