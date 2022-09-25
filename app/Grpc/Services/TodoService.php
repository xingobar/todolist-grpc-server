<?php


namespace App\Grpc\Services;


use Google\Protobuf;
use Protobuf\Entity\Todo;
use Protobuf\Services\TodoResponse;
use Protobuf\Services\TodoServiceInterface;
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
    public function ListTodos(GRPC\ContextInterface $ctx, Protobuf\GPBEmpty $in): TodoResponse
    {
        $todos = $this->todoService->getTodos();

        $response = new TodoResponse();

        $response->setTodos($todos->map(function($todo) {
            return (new Todo())->setId($todo->id)
                    ->setName($todo->name)
                    ->setIsComplete($todo->is_complete);
        })->toArray());

        return $response;
    }
}