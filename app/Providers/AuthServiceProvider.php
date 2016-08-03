<?php

namespace App\Providers;

use App\Channel;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function () {
            return auth()->user()->isAdmin();
        });

        $gate->define('youparty', function ($user, Channel $channel) {

            return $channel->user_id == $user->id;
        });

        $gate->define('admin', function ($user, Channel $channel) {

            return auth()->user()->isAdmin();
        });
    }
}
