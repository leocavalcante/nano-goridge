<?php declare(strict_types=1);

use Hyperf\Nano\Factory\AppFactory;
use Hyperf\Contract\StdoutLoggerInterface;
use Spiral\Goridge\RPC\RPC;
use Spiral\Goridge\Relay;

require_once __DIR__ . '/vendor/autoload.php';

$app = AppFactory::createApp();

$app->addCommand('hello-go', function (): void {
    $relay = Relay::create('tcp://127.0.0.1:1337');
    defer(static fn() => $relay->close());
    
    $go = new RPC($relay);
    $this->get(StdoutLoggerInterface::class)->info($go->call('App.HelloGolang', []));
});

$app->run();
