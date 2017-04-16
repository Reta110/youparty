<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'channel_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}
