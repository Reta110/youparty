<?php namespace you;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {

    protected $table = 'channels';
    protected $fillable = ['name','nick_name'];

    public function videos(){
        return $this->hasMany('you/ChannelVideos');
    }

}
