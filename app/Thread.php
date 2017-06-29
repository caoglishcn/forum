<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded=[];
    function path(){
        return '/threads/'.$this->id;
    }

    function replies(){
        return $this->hasMany(Reply::class);
    }

    function creator(){
        return $this->belongsTo(User::class,"user_id");
    }

    function addReply($reply)
    {
        $this->replies()->create($reply);
    }
}
