<?php

declare(strict_types=1);

namespace PedhotDev\NepotismFree\Core;

/**
 * Manages container policies and module boundaries.
 */
class Policy
{
    private array $exposedServices = [];
    private bool $moduleStrictnessEnabled = false;

    public function markExposed(string $id): void
    {
        $this->exposedServices[$id] = true;
    }

    public function isExposed(string $id): bool
    {
        if (!$this->moduleStrictnessEnabled) {
            return true;
        }
        return $this->exposedServices[$id] ?? false;
    }

    public function setModuleStrictness(bool $enabled): void
    {
        $this->moduleStrictnessEnabled = $enabled;
    }
}
