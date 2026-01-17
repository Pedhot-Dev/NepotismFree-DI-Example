<?php

declare(strict_types=1);

use App\Application\EventDispatcher;
use App\Application\NotificationChannelCollection;
use App\Infrastructure\Channel\DiscordChannel;
use App\Infrastructure\Channel\EmailChannel;
use PedhotDev\NepotismFree\Builder\ContainerBuilder;

require_once __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();

// Register concrete services
// The container auto-wires concrete classes, but explicit binding is safer/cleaner here.
$builder->bind(EmailChannel::class, EmailChannel::class);
$builder->bind(DiscordChannel::class, DiscordChannel::class);

// Bind the collection and dispatcher
// They will be auto-wired using constructor injection ONLY.
$builder->bind(NotificationChannelCollection::class, NotificationChannelCollection::class);
$builder->bind(EventDispatcher::class, EventDispatcher::class);

// No closures, no service locator, no manual instantiation.

/** @var \PedhotDev\NepotismFree\Core\Container $container */
$container = $builder->build();

return $container;
