<?php

namespace App\Repositories;
use App\Models\Points;

class PointsRepository
{   
    protected $entity;

    public function __construct(Points $points)
    {
        $this->entity = $points;
    }

    public function getPointsByCpf(string $cpf) 
    {
        return $this->entity->where('users_cpf', '=', $cpf)->firstOrFail();
    }

    public function  updatePointsByCpf(array $data, string $cpf)
    {
        $point = $this->getPointsByCpf($cpf);
        $point->update($data);
        
        return $point;
    }
}