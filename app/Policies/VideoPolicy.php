<?php

namespace App\Policies;

use App\Video;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;

    public function video(User $user, Video $video)
    {
        return $user->owns($video);
    }
}
