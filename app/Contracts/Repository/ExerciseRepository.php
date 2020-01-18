<?php

namespace App\Contracts\Repository;

use App\Contracts\Entity\ExerciseEntity;

interface ExerciseRepository
{
    function createEmptyExerciseEntity():ExerciseEntity;

    function insertNewProject(ExerciseEntity $exercise);
}