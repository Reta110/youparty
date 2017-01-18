<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == 'admin';
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function getNickAttribute()
    {
        $part = explode(" ", $this->name);
        return $part[0];
    }

    public function owns(Channel $channel)
    {
        return $this->id === $channel->user_id;
    }
}
