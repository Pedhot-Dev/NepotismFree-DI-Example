<?php

declare(strict_types=1);

use App\Application\EventDispatcher;
use App\Domain\Event\OrderPaid;
use App\Domain\Event\UserRegistered;
use PedhotDev\NepotismFree\Core\Container;

/** @var Container $container */
$container = require_once __DIR__ . '/bootstrap.php';

// ALL object creation must be performed by the DI container
/** @var EventDispatcher $dispatcher */
$dispatcher = $container->get(EventDispatcher::class);

echo "--- Dispatching UserRegistered Event ---" . PHP_EOL;
$dispatcher->dispatch(new UserRegistered("john@example.com", "johndoe"));

echo PHP_EOL . "--- Dispatching OrderPaid Event ---" . PHP_EOL;
$dispatcher->dispatch(new OrderPaid("ORD-12345", 99.99));
