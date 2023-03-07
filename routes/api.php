<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\JobAdController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CvController;
use App\Http\Controllers\Api\jobApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/authenticate/login", [AuthController::class, "login"]);
Route::post("/authenticate/register", [AuthController::class, "register"]);

Route::get("/jobs", [JobAdController::class, "someJobs"]);

Route::get("/companies", [CompanyController::class, "index"]);
Route::get("/companies/{company}", [CompanyController::class, "show"]);



Route::group(["middleware" => "jwt.verify", "prefix" => "auth"], function () {
    Route::get("/me", [AuthController::class, "me"]);
    Route::put("/me/update", [AuthController::class, "update"]);
    Route::post("/logout", [AuthController::class, "logout"]);

    Route::get("/jobs", [JobAdController::class, "index"]);
    Route::get("/jobs/{job_ad}", [JobAdController::class, "show"]);

    Route::get("/categories", [CategoryController::class, "index"]);
    Route::get("/categories/{category}", [CategoryController::class, "show"]);

    Route::get("/applications", [jobApplicationController::class, "userJobsApplications"]);
    Route::get("/applications/{job_application}", [jobApplicationController::class, "show"]);
    Route::post("/applications", [jobApplicationController::class, "store"]);
    Route::delete("/applications", [jobApplicationController::class, "destroy"]);

    Route::get("/cv",[CvController::class,"show"]);
    Route::post("/cv",[CvController::class,"store"]);
    Route::delete("/cv",[CvController::class,"destroy"]);

});

// Route::get("/*", function(){ return throw new NotFoundHttpException("risorsa non trovata");});
