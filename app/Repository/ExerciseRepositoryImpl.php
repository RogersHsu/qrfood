<?php

namespace App\Repository;

use App\Contracts\Entity\ExerciseEntity;
use App\Contracts\Repository\ExerciseRepository;
use App\Exercises;

class ExerciseRepositoryImpl implements ExerciseRepository
{
    public function createEmptyExerciseEntity():ExerciseEntity
    {
        $exercise = new Exercises();
       
        if ($exercise instanceof ExerciseEntity) {
            return $exercise;
        } else {
            throw new TypeError('Exercise must implement ExerciseEntity.');
        }
    }

    public function insertNewProject(ExerciseEntity $exercise)
    {
        $exercise->save();
    }
}
