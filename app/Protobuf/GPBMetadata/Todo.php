<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: entity/todo.proto

namespace Protobuf\GPBMetadata;

class Todo
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
entity/todo.protoentity"D
Todo

id (
title (	
name (	
is_complete (B)�Protobuf\\Entity�Protobuf\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}
