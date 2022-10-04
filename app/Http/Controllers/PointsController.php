<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Http\Requests\StorePointsRequest;
use App\Http\Requests\UpdatePointsRequest;
use App\Services\PointsService;
use App\Http\Resources\PointsResource;

class PointsController extends Controller
{

    protected $pointsService;

    public function __construct(PointsService $pointsService)
    {
        $this->pointsService = $pointsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendPoint(StorePointsRequest $request , String $cpf)
    {
        $point = $this->pointsService->sendPointService($request->validated(), $cpf);
        
        return new PointsResource($point);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPoint(StorePointsRequest $request ,String $cpf)
    {

        $point = $this->pointsService->points($request->validated(), $cpf);
        
        return new PointsResource($point);   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Points  $points
     * @return \Illuminate\Http\Response
     */
    public function showPoints(String $cpf)
    {
        $point = $this->pointsService->showPoints($cpf);

        return new PointsResource($point);
    }

    
   
}
