<?php

namespace App\Providers;

use App\Channel;
use App\Policies\ChannelPolicy;
use App\Video;
use App\Policies\VideoPolicy;
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
        //'App\Model' => 'App\Policies\ModelPolicy',
        Channel::class => ChannelPolicy::class,
        Video::class => VideoPolicy::class,
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

        $gate->before(function ($user) {

            if ($user->isAdmin()) {
                return true;
            }
        });

        $gate->define('youparty', function ($user, $channel) {
            return $channel->user_id == $user->id;
        });

        $gate->define('admin', function ($user, Channel $channel) {

            return auth()->user()->isAdmin();
        });
    }
}
