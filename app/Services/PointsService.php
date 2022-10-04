<?php

namespace App\Services;


use App\Repositories\PointsRepository;

class PointsService
{

    protected $repository;

    public function __construct(PointsRepository $pointsRepository)
    {
        $this->repository = $pointsRepository;
    }

    public function showPoints(String $cpf)
    {
        $points = $this->repository->getPointsByCpf($cpf);

        return $points;
    }

    public function sendPointService(Array $data, String $cpf)
    {
        $points = $this->repository->getPointsByCpf($cpf);

        $point = $points->toArray();

        $balance = $point['balance'];

        if($data['send'] <= $balance) {

            $new_balance = $balance - $data['send'];

            return $this->repository->updatePointsByCpf(['balance' => $new_balance], $cpf);
        }


        return ['saldo' => 'insuficiente'];

        
    }

    public function points(Array $data, String $cpf)
    {
        $points = $this->repository->getPointsByCpf($cpf);

        $point = $points->toArray();  
        $balance = $point['balance'];

        $new_balance = $balance + $data['send'];

        return $this->repository->updatePointsByCpf(['balance' => $new_balance], $cpf);
    }
   
    
}