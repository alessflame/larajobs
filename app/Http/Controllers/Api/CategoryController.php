<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Response\CustomResponse;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
    public function index(CategoryServiceInterface $categoryService)
    {
        $response = $categoryService->getAll();
        // return response()->json($response);

        return CustomResponse::successResponse("trovati", 200, $response["data"]);

    }

    public function show($id, CategoryServiceInterface $categoryService)
    {
        $response = $categoryService->showCategory($id);
        if(!$response["status"]){
            return throw new NotFoundHttpException("Categoria non trovata");
        }
        return CustomResponse::successResponse("trovato", 200, $response["data"]);
    }
}
