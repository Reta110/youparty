<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table = 'channel_videos';

    protected $fillable = [ 'title', 'viewed', 'videoId', 'thumbnail' ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');

    }

}
