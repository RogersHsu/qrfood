<?php

namespace App;

use App\Contracts\Entity\ExerciseEntity; 

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model implements ExerciseEntity
{
    protected $table = 'exercises';
    
    public function setfdName($fdName)
    {
        return $this->fdName = $fdName;
    } 
    public function setPrice($price)
    {
        return $this->price = $price;
    }
}
