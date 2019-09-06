<?php

namespace App\Demo\Repositories\Company;
use App\Models\Company;
use \Illuminate\Support\Facades\Auth;

class CompanyRepository implements CompanyInterface
{
    public function getCompanies()
    {
	    $companies = NULL;
        try {
            $companies = Company::all();

            return $companies;
        } Catch(\Exception $ex) {
	        $companies = NULL;
        }
        return $companies;
    }

	/**
	 * @param $request
	 * @return $companyId
	 */
    public function createCompany($request)
    {
        $user = Auth::user();
    	$companyId = NULL;
	    try{
	    	$company = new Company();
	    	$company->name = $request->name;
		    $company->location = $request->location;
		    $company->created_by = $user->id;
	    	$company->save();
		    $companyId =  $company->id;
	    }catch (\Exception $exception){
		    $companyId = NULL;
	    }
	    return $companyId;
    }

    public function findProduct($request){

    }

}