<?php

namespace App\Demo\Repositories\Company;

interface CompanyInterface
{
    public function getCompanies();
	public function createCompany($request);
	public function findProduct($request);


}