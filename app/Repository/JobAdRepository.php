<?php

namespace App\Repository;

use App\Models\JobAd;
use Illuminate\Support\Collection;
use App\Repository\Contracts\JobAdRepositoryInterface;

class JobAdRepository implements JobAdRepositoryInterface
{

    public function getModel()
    {
        return new JobAd();
    }

    public function findById(int $id, $user)
    {
        $jobAd = $this->getModel()->where("id", $id)->first();

        $applications = $jobAd->jobApplications;
        foreach ($applications as $application) {
            if ($application->user->id === $user->id) {
                $jobAd->maked = true;
            } else {
                $jobAd->maked = false;
            }
        }
        return $jobAd;
    }

    public function all($user)
    {
        $jobAds = $this->getModel()->get();
        $newJobAds = [];

        foreach ($jobAds as $jobAd) {
            $applications = $jobAd->jobApplications;
            foreach ($applications as $application) {
                if ($application->user->id === $user->id) {
                    $jobAd->maked = true;
                } else {
                    $jobAd->maked = false;
                }
            }
            array_push($newJobAds, $jobAd);
        };

        return $newJobAds;
    }
}
