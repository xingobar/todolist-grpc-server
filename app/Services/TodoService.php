<?php

namespace App\Services;


use App\Repositories\TodoRepository;
use Recca0120\Repository\Criteria;

class TodoService
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function getTodos()
    {
        $criteria = Criteria::create()
            ->orderByDesc('id');

        return $this->todoRepository->get($criteria);
    }

    public function findById(int $id)
    {
        return $this->todoRepository->find($id);
    }
}