<?php declare(strict_types=1);

use Hyperf\Nano\Factory\AppFactory;
use Hyperf\Contract\StdoutLoggerInterface;
use Spiral\Goridge\RPC\RPC;
use Spiral\Goridge\Relay;

require_once __DIR__ . '/vendor/autoload.php';

define('SWOOLE_HOOK_FLAGS', SWOOLE_HOOK_ALL ^ SWOOLE_HOOK_SOCKETS);

$app = AppFactory::createApp();
$go = new RPC(Relay::create('tcp://127.0.0.1:1337'));

$app->addCommand('hello-go', function () use ($go): void {
    $this->get(StdoutLoggerInterface::class)->info($go->call('App.HelloGolang', []));
});

$app->run();
