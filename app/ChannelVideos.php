<?php namespace you;

use Illuminate\Database\Eloquent\Model;

class ChannelVideos extends Model {

    protected $table = 'channel_videos';
    protected $fillable = ['url','viewed'];

    public function channel(){
        return $this->belongsTo('you/Channel');
    }

}
