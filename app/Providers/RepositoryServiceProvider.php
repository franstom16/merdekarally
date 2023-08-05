<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AssessmentRepositoryInterface;
use App\Repositories\AssessmentRepository;
use App\Interfaces\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Interfaces\ParticipantRepositoryInterface;
use App\Repositories\ParticipantRepository;
use App\Interfaces\Race\ScoresRepositoryInterface;
use App\Repositories\Race\ScoresRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AssessmentRepositoryInterface::class, AssessmentRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(ParticipantRepositoryInterface::class, ParticipantRepository::class);
        $this->app->bind(ScoresRepositoryInterface::class, ScoresRepository::class);
    }
}
