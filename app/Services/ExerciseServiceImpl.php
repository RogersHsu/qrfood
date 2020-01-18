<?php

namespace App\Services;

use App\Contracts\Services\ExerciseService;
use App\Contracts\Repository\ExerciseRepository;
use Exception;

class ExerciseServiceImpl implements ExerciseService
{
    private $exerciseRepository;

    function __construct(ExerciseRepository $exerciseRepository){
        $this->exerciseRepository = $exerciseRepository;
    }
    
    function createNewExercise($postJsonData){
        try{
          
            $fdName = $postJsonData[0]->fdName;
            $price = $postJsonData[0]->price;
            $exercise = $this->exerciseRepository->createEmptyExerciseEntity();
            $exercise->setfdName($fdName);
            $exercise->setPrice($price);
    
            $this->exerciseRepository->insertNewProject($exercise);
        }catch(Exception $e){
            throw new Exception($e);
        }
      
    }
}