<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    public function users(){
        return $this->belongsTo('App\user');
    }

    public function returns(){
        return $this->belongsTo('App\return');
    }
}
