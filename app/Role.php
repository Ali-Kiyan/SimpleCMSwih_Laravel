<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //



//inversion of the relation between role and users (both ways are possible)
//    public function users () {
//
//        return $this->belongsToMany('App\User');
//
//    }
}
