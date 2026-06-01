<?php

declare(strict_types=1);

namespace Kaiseki\LaravelHelperMocks;

use Psr\Container\ContainerInterface;

final class Helper
{
    /**
     * Returns the global container instance when it is a PSR container, otherwise null.
     */
    public static function getContainer(): ?ContainerInterface
    {
        global $container;

        return $container instanceof ContainerInterface ? $container : null;
    }
}
