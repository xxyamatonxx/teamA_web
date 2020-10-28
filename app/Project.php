<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function rewards(){
        return $this->hasMany('App\Reward');
    }
    protected $fillable = [
        'user_id',
        'release',
        'title',
        'subtitle',
        'overview',
        'image',
        'target_money',
        'now_support_money',
        'now_supportors',
        'start',
        'end',
    ];
}
