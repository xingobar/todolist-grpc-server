<?php
# Generated by the protocol buffer compiler (spiral/php-grpc). DO NOT EDIT!
# source: services/todo_services.proto

namespace Protobuf\Services;

use Spiral\GRPC;
use Google\Protobuf;

interface TodoServiceInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "services.TodoService";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param Protobuf\GPBEmpty $in
    * @return TodoResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function ListTodos(GRPC\ContextInterface $ctx, Protobuf\GPBEmpty $in): TodoResponse;
}
