<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Channel extends Model
{

    protected $fillable = [ 'name' ];


    public function user()
    {
        return $this->belongsTo(User::class, 'channel_id');

    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
