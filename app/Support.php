<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function project(){
        return $this->belongsTo('App\Project');
    }
    
    public function reward(){
        return $this->belongsTo('App\Reward');
    }
    protected $fillable = [
        'user_id',
        'project_id',
        'reward_id',
    ];
}
