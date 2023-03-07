<?php

namespace App\Services\JobApplication;

use App\Response\CustomResponse;
use App\Services\Core\BaseService;
use App\Http\Resources\JobApplicationResource;
use App\Services\Contracts\JobApplicationServiceInterface;
use App\Repository\Contracts\JobApplicationRepositoryInterface;

class JobApplicationService extends BaseService implements JobApplicationServiceInterface
{

    protected $jobApplicationRepository;

    public function __construct(JobApplicationRepositoryInterface $jobApplicationRepository)
    {
        $this->jobApplicationRepository = new $jobApplicationRepository();
    }

    public function getAll($user)
    {
        $jobApplications = $this->jobApplicationRepository->all($user);
        if (!$jobApplications) {
            $this->status = false;
            return $this->parseResponse();
        }
        $this->response = $jobApplications;
        return $this->parseResponse();
    }

    public function getDetail(int $id, $user)
    {
        //dettaglio di una singola richiesta
        $jobApplication = $this->jobApplicationRepository->findById($id, $user);

        if (!$jobApplication) {
            $this->status = false;
            return $this->parseResponse();
        }

        $this->response = $jobApplication;
        return $this->parseResponse();
    }

    public function storeNewApplication($user, $request)
    {
        //confronto l'id dello user autenticato con lo user che effettua la richiesta(dal fronend)
        if ($user->id === $request->user_id) {
            $jobApplication =  $this->jobApplicationRepository->storeApplication($user, $request);
            if ($jobApplication) {
                $this->response = $jobApplication;
                return $this->parseResponse();
            }
        }
        $this->status = false;
        $this->errors = "Qualcosa è andato storto!!";
        return $this->parseResponse();
    }

    function deleteApplication($user, $request)
    {
        if ($user->id === $request->user_id) {
            $jobApplication =  $this->jobApplicationRepository->destroyApplication($user, $request);
            if ($jobApplication) {
                return $this->parseResponse();
            }
        }
        $this->status = false;
        $this->errors = "Qualcosa è andato storto durante l'eliminazione!";
        return $this->parseResponse();
    }
}
