<?php

namespace App\Providers;

use App\Demo\Repositories\Company\CompanyInterface;
use App\Demo\Repositories\Company\CompanyRepository;
use App\Demo\Repositories\Product\ProductInterface;
use App\Demo\Repositories\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
	    $this->app->bind(ProductInterface::class, ProductRepository::class);

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

    public function provides()
    {
        return [
        	CompanyInterface::class,
	        ProductInterface::class,
        ];
    }

}
