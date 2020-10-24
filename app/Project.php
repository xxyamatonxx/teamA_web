<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
<<<<<<< HEAD
    //
=======
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function rewards(){
        return $this->hasMany('App\Rewards');
    }
    protected $fillable = [
        'title',
        'subtitle',
        'overview',
        'image1',
        'image2',
        'image3',
        'target_money',
        'now_support_money',
        'now_supportors',
        'start',
        'end',
    ];
>>>>>>> 3d293048d697bbe31824ee8cc4608a35ad00e7df
}
