<?php

declare(strict_types=1);

namespace App\Infrastructure\Channel;

use App\Domain\Contract\NotificationChannel;

class DiscordChannel implements NotificationChannel
{
    public function notify(string $message): void
    {
        echo "[Discord] Sending notification: " . $message . PHP_EOL;
    }
}
