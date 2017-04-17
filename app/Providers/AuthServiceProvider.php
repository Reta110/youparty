<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        Channel::class => ChannelPolicy::class,
        Video::class => VideoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isOwnerOfChannel', function ($user, $channel) {
            return $user->id == $channel->user_id;
        });

        Gate::define('video', function ($user, $video) {
            return $user->owns($video);
        });

        Gate::define('isOwnerOfVideoChannel', function ($user, $video) {
            return $user->id === $video->channel->user_id;
        });

        Gate::define('owner', function ($user, $video) {
            if ($user->owns($video)) {
                return true;
            }

            if ($user->id === $video->channel->user_id){
                return true;
            }

            if ($user->isAdmin()) {
                return true;
            }
        });

    }
}
