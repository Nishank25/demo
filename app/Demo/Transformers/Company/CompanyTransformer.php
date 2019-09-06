<?php


namespace App\Demo\Transformers\Company;


class CompanyTransformer
{
    public function getCompanies($details) {
        $response['status'] = TRUE;
        $response['details'] = $details;
        return response()->json($response,200);
    }

	public function createCompany($companyId) {
		$response['status'] = FALSE;
		$response['message'] = 'Error while creating company.';
    	if(isset($companyId) && (!empty($companyId))){

		    $response['status'] = TRUE;
		    $response['message'] = 'Company created successfully.';
		    $response['company_id'] = $companyId;
	    }
		return response()->json($response,200);
	}
}