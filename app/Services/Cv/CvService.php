<?php

namespace App\Services\Cv;

use App\Services\Core\BaseService;
use Illuminate\Support\Facades\Storage;
use App\Services\Contracts\CvServiceInterface;
use App\Repository\Contracts\CvRepositoryInterface;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class CvService extends BaseService implements CvServiceInterface
{

    protected $cvRepository;

    public function __construct(CvRepositoryInterface $cvRepositoryInterface)
    {
        $this->cvRepository = new $cvRepositoryInterface();
    }

    public function showCv($user)
    {

        //find
        $cv = $this->cvRepository->find($user);
        if (!$cv) {
            $this->status = false;
        }
        $this->response = $cv->filename;

        return $this->parseResponse();
    }

    public function createCv($request, $user)
    {
        // if ($request->hasFile("cvfile")) {
        //     //find
        //     if ($file = $this->cvRepository->find($user)) {
        //         if (Storage::exists('public/' . $file->filename)) {
        //             Storage::delete('public/' . $file->filename);
        //         }
        //         //delete
        //         $this->cvRepository->delete($user);
        //     }

        //     if ($path = $request->file("cvfile")->store("public")) {
        //         //create
        //         $this->response= $this->cvRepository->create($user, $path);
        //         return $this->parseResponse();
        //     };
        //     $this->status = false;
        // }
        // $this->status = false;

        if ($request->hasFile("cvfile")) {
            //find
            if ($file = $this->cvRepository->find($user)) {
                if ($file) {
                    Cloudinary::destroy((explode(".", explode("/", $file)[7])[0]));
                }
                //delete
                $this->cvRepository->delete($user);
            }
            //create
            $uploadedFileUrl = Cloudinary::upload($request->file('cvfile')->getRealPath())->getSecurePath();
            $this->response = $this->cvRepository->create($user, $uploadedFileUrl);
            return $this->parseResponse();

            $this->status = false;
        }
        $this->status = false;


        return $this->parseResponse();
    }

    public function deleteCV($user)
    {

        if ($file = $this->cvRepository->find($user)) {
            if ($file) {
                Cloudinary::destroy((explode(".", explode("/", $file)[7])[0]));
            }

            $this->cvRepository->delete($user);
            return $this->parseResponse();
        }
        $this->status = false;
        return $this->parseResponse();
    }
}
