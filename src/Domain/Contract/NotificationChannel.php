<?php

declare(strict_types=1);

namespace App\Domain\Contract;

interface NotificationChannel
{
    public function notify(string $message): void;
}
