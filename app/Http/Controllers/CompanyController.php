<?php

namespace App\Http\Controllers;

use App\Demo\Repositories\Company\CompanyInterface;
use App\Demo\Transformers\Company\CompanyTransformer;
use App\Http\Requests\CompanyRegisterRequest;
use Illuminate\Http\Request;
use JWTAuth;

class CompanyController extends Controller
{
	protected $user;

	public function __construct()
	{
		$this->user = JWTAuth::parseToken()->authenticate();
	}
	public function index(CompanyTransformer $companyTransformer, CompanyInterface $companyInterface, Request $request) {
        return $companyTransformer->getCompanies($companyInterface->getCompanies());
    }

	public function create(CompanyTransformer $companyTransformer, CompanyInterface $companyInterface, CompanyRegisterRequest $request) {
			return $companyTransformer->createCompany($companyInterface->createCompany($request));
	}
}
