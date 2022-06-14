<?php

namespace App\Providers;

use App\Repositories\CategoryRepository\CategoryRepoRepository;
use App\Repositories\CompanyRepository\CompanyRepository;
use App\Repositories\Interfaces\CategoryRepoInterface;
use App\Repositories\Interfaces\CompanyRepoInterface;
use App\Repositories\Interfaces\TaxRepoInterface;
use App\Repositories\Interfaces\UserRepoInterface;
use App\Repositories\TaxRepository\TaxRepository;
use App\Repositories\UserRepository\UserRepoRepository;
use App\Services\BrandService\BrandService;
use App\Services\CategoryServices\CategoryService;
use App\Services\CompanyServices\CompanyService;
use App\Services\CurrencyServices\CurrencyService;
use App\Services\Interfaces\BrandServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CompanyServiceInterface;
use App\Services\Interfaces\CurrencyServiceInterface;
use App\Services\Interfaces\LanguageServiceInterface;
use App\Services\Interfaces\ShopServiceInterface;
use App\Services\Interfaces\TaxServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\LanguageServices\LanguageService;
use App\Services\ShopServices\ShopService;
use App\Services\TaxServices\TaxService;
use App\Services\UserServices\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Repositories biding
        $this->app->bind(UserRepoInterface::class, UserRepoRepository::class);
        $this->app->bind(CategoryRepoInterface::class, CategoryRepoRepository::class);
        $this->app->bind(CompanyRepoInterface::class, CompanyRepository::class);
        $this->app->bind(TaxRepoInterface::class, TaxRepository::class);

        // Services biding
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);
        $this->app->bind(TaxServiceInterface::class, TaxService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
