<?php

declare(strict_types=1);

namespace PedhotDev\NepotismFree\Exception;

use Psr\Container\ContainerExceptionInterface;
use Exception;

/**
 * Base exception for all NepotismFree DI exceptions.
 */
class ContainerException extends Exception implements ContainerExceptionInterface
{
}
