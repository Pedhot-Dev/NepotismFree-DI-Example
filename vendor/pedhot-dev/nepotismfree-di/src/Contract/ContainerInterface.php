<?php

declare(strict_types=1);

namespace PedhotDev\NepotismFree\Contract;

use Psr\Container\ContainerInterface as PsrContainerInterface;

interface ContainerInterface extends PsrContainerInterface
{
    /**
     * @template T
     * @param string|class-string<T> $id
     * @return mixed|T
     */
    /**
     * Resolve a tag into an iterable of services.
     * 
     * @return iterable<mixed>
     */
    public function getTagged(string $tag): iterable;
}
