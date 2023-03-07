<?php

namespace App\Services\JobAd;

use App\Http\Resources\JobAdResource;
use App\Repository\Contracts\JobAdRepositoryInterface;
use App\Services\Contracts\JobAdServiceInterface;
use App\Services\Core\BaseService;

class JobAdService extends BaseService implements JobAdServiceInterface
{

    protected $jobAdRepository;

    public function __construct(JobAdRepositoryInterface $jobAdRepository)
    {
        $this->jobAdRepository = new $jobAdRepository();
    }

    public function getAll($user)
    {
        $jobAds = $this->jobAdRepository->all($user);

        // foreach ($jobAds as $ad) {
        //     $ad->category;
        // }

        $this->response = JobAdResource::collection($jobAds);
        return $this->parseResponse();
    }

    public function getDetail(int $id, $user)
    {

        $jobAd = $this->jobAdRepository->findByID($id, $user);
        if (!$jobAd) {
            $this->status = false;
        }

        $this->response = new JobAdResource($jobAd);


        return $this->parseResponse();
    }
}
