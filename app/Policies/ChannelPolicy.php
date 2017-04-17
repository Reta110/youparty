<?php

namespace App\Policies;

use App\Channel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChannelPolicy
{
    use HandlesAuthorization;

    public function accept(User $user, Channel $channel)
    {
        return $user->owns($channel);
    }


}
