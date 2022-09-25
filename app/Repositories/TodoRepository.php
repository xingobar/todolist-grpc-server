<?php


namespace App\Repositories;


use App\Models\Todo;
use Recca0120\Repository\EloquentRepository;

class TodoRepository extends EloquentRepository
{
    public function __construct(Todo $model)
    {
        parent::__construct($model);
    }
}