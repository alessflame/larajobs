<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){
        $companies= DB::table('users')->where("isCompany",1)->get();
        return response()->json($companies);
    }

    public function show(User $company){
        if(!$company->isCompany){
            return response()->json(["message"=>"non trovata"]);
        };
        $company->jobs;
        return response()->json($company);
    }
}
