<?php

declare(strict_types=1);

namespace App\Infrastructure\Channel;

use App\Domain\Contract\NotificationChannel;

class EmailChannel implements NotificationChannel
{
    public function notify(string $message): void
    {
        echo "[Email] Sending notification: " . $message . PHP_EOL;
    }
}
