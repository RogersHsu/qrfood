<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\ExerciseService;
use Exception;

class exerciseController extends Controller
{
    private $exerciseService;

    function __construct(ExerciseService $exerciseService){
        $this->exerciseService = $exerciseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $postJsonData = request()->getContent();
            $postJsonData = json_decode($postJsonData);
            $this->exerciseService->createNewExercise($postJsonData);
             //return $this->successResponseHandle();
            return $postJsonData;
        
       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    private function successResponseHandle($message = 'ok')
    {
        $response = array(
            'success' => true,
            'message' => $message
        );
        return response()->json($response);
    }
    private function unknownError(Exception $exception)
    {
        $response = array(
            'success' => false,
            'message' => $exception->getMessage()
        );
        return response()->json($response);
    }
}
