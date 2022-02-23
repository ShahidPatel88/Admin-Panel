<?php

namespace App\Providers;

use App\Interfaces\BlogRepositoryInterface;
use App\Interfaces\ContactRequestRepositoryInterface;
use App\Interfaces\EmailServiceInterface;
use App\Interfaces\EmailTemplateRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SiteConfigurationInterface;
use App\Interfaces\SiteConfigurationsRepositoryInterface;
use App\Interfaces\UserAuthRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\BlogRepository;
use App\Repositories\ContactRequestRepository;
use App\Repositories\EmailTemplateRepository;
use App\Repositories\PageRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SiteConfigurationsRepository;
use App\Repositories\UserAuthRepository;
use App\Repositories\UserRepository;
use App\Services\EmailService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SiteConfigurationInterface::class, function ($app) {
            return $app->make(SiteConfigurationsRepository::class);
        });

        $this->app->bind(EmailTemplateRepositoryInterface::class, function ($app) {
            return $app->make(EmailTemplateRepository::class);
        });


    }
}
