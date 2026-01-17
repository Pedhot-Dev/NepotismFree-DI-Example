<?php

declare(strict_types=1);

namespace App\Application;

class EventDispatcher
{
    public function __construct(
        private readonly NotificationChannelCollection $channels
    ) {}

    public function dispatch(object $event): void
    {
        $message = "Unknown event occurred.";

        if ($event instanceof \App\Domain\Event\UserRegistered) {
            $message = "User registered: " . $event->username . " (" . $event->email . ")";
        } elseif ($event instanceof \App\Domain\Event\OrderPaid) {
            $message = "Order paid: " . $event->orderId . " amount: $" . $event->amount;
        }

        foreach ($this->channels as $channel) {
            $channel->notify($message);
        }
    }
}
