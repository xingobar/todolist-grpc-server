<?php


namespace App\Grpc\Services;


use Google\Protobuf;
use Protobuf\Entity;
use Protobuf\Entity\Todo;
use Protobuf\Services\TodoGetRequest;
use Protobuf\Services\TodoResponse;
use Protobuf\Services\TodoServiceInterface;
use Protobuf\Services\TodosResponse;
use Spiral\GRPC;

class TodoService implements TodoServiceInterface
{
    protected $todoService;

    public function __construct(\App\Services\TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param Protobuf\GPBEmpty $in
     * @return TodoResponse
     *
     * @throws GRPC\Exception\InvokeException
     */
    public function ListTodos(GRPC\ContextInterface $ctx, Protobuf\GPBEmpty $in): TodosResponse
    {
        $todos = $this->todoService->getTodos();

        $response = new TodosResponse();

        $response->setTodos($todos->map(function($todo) {
            return (new Todo())->setId($todo->id)
                    ->setName($todo->name)
                    ->setIsComplete($todo->is_complete);
        })->toArray());

        return $response;
    }

    /**
     * @param GRPC\ContextInterface $ctx
     * @param TodoGetRequest $in
     * @return Entity\Todo
     *
     * @throws GRPC\Exception\InvokeException
     */
    public function GetById(GRPC\ContextInterface $ctx, TodoGetRequest $in): TodoResponse
    {
        $response = new TodoResponse();

        if (!$todo = $this->todoService->findById($in->getId())) {
            $response->setError(
                (new Entity\Error())
                    ->setCode(404)
                    ->setMessage('找不到資料')
            );

            return $response;
        }

        $response->setTodo(
            (new Todo())
                ->setId($todo->id)
                ->setName($todo->name)
                ->setIsComplete($todo->is_complete)
        );

        return $response;
    }
}