<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $primaryKey = 'pId';
    public $timestamps = false;

    public function picture()
    {
        return $this->hasOne('App\Picture');
    }
}
