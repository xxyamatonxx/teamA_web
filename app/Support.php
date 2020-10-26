<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function reward(){
        return $this->belongsTo('App\Reward');
    }
}
