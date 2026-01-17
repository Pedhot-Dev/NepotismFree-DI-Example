<?php

declare(strict_types=1);

namespace App\Application;

use App\Infrastructure\Channel\DiscordChannel;
use App\Infrastructure\Channel\EmailChannel;
use IteratorAggregate;
use Traversable;

class NotificationChannelCollection implements IteratorAggregate
{
    public function __construct(
        private readonly EmailChannel $emailChannel,
        private readonly DiscordChannel $discordChannel
    ) {}

    public function getIterator(): Traversable
    {
        yield $this->emailChannel;
        yield $this->discordChannel;
    }
}
