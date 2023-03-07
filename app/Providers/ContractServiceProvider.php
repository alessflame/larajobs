<?php

namespace App\Providers;

use App\Repository\AuthRepository;
use App\Repository\CategoryRepository;
use App\Repository\Contracts\AuthRepositoryInterface;
use App\Repository\Contracts\CategoryRepositoryInterface;
use App\Repository\Contracts\CvRepositoryInterface;
use App\Repository\Contracts\JobAdRepositoryInterface;
use App\Repository\Contracts\JobApplicationRepositoryInterface;
use App\Repository\CvRepository;
use App\Repository\JobAdRepository;
use App\Repository\JobApplicationRepository;
use App\Services\Auth\AuthService;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\JobAdServiceInterface;
use App\Services\Category\CategoryService;
use App\Services\Contracts\AuthServiceInterface;
use App\Services\Contracts\CvServiceInterface;
use App\Services\Contracts\JobApplicationServiceInterface;
use App\Services\Cv\CvService;
use App\Services\JobAd\JobAdService;
use App\Services\JobApplication\JobApplicationService;
use Illuminate\Support\ServiceProvider;

class ContractServiceProvider extends ServiceProvider
{

    public $bindings=[
        //Repository
        JobAdRepositoryInterface::class => JobAdRepository::class,
        CategoryRepositoryInterface::class=> CategoryRepository::class,
        JobApplicationRepositoryInterface::class=> JobApplicationRepository::class,
        AuthRepositoryInterface::class=> AuthRepository::class,
        CvRepositoryInterface::class=> CvRepository::class,

        //Services
        JobAdServiceInterface::class => JobAdService::class,
        CategoryServiceInterface::class=> CategoryService::class,
        JobApplicationServiceInterface::class=> JobApplicationService::class,
        AuthServiceInterface::class=>AuthService::class,
        CvServiceInterface::class=>CvService::class



    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
