<?php

use Illuminate\Contracts\Console\Kernel;
use Spiral\Goridge\StreamRelay;
use Spiral\RoadRunner\Worker;

require_once __DIR__ . '/vendor/autoload.php';

/** 載入 Laravel 核心 */
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

/** 加入 gRPC Server 物件 */
$server = $app->make(\Spiral\GRPC\Server::class, [ ['debug' => true]]);

/** 註冊想要的服務 */

/** 啟始 worker */
$worker = new  Spiral\RoadRunner\Worker(new Spiral\Goridge\StreamRelay(STDIN, STDOUT));

$server->serve($worker);