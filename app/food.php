<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class food extends Model
{   
    protected $table = 'food';
    protected $primaryKey = 'fdId';
    protected $guarded = [];

    public function restaurant(){
        return $this->hasMany('App\restaurant','rsId','rsId');
    }
    public function category(){
        return $this->hasMany('App\category','cId','cId');
    }
}
