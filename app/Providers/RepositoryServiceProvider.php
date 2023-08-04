<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ParticipantRepositoryInterface;
use App\Repositories\ParticipantRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParticipantRepositoryInterface::class, ParticipantRepository::class);
    }
}
