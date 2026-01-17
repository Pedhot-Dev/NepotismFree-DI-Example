<?php

declare(strict_types=1);

namespace App\Domain\Event;

class OrderPaid
{
    public function __construct(
        public readonly string $orderId,
        public readonly float $amount
    ) {}
}
