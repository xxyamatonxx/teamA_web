<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
<<<<<<< HEAD
    //
=======
    public function users(){
        return $this->belongsTo('App\user');
    }

    public function returns(){
        return $this->belongsTo('App\return');
    }
>>>>>>> 3d293048d697bbe31824ee8cc4608a35ad00e7df
}
