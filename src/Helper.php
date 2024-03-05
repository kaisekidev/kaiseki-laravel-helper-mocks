<?php

declare(strict_types=1);

namespace Kaiseki\LaravelHelperMocks;

use Psr\Container\ContainerInterface;

use function array_key_exists;

final class Helper
{
    /**
     * Returns the container instance.
     *
     * @return ContainerInterface|null
     */
    public static function getContainer(): null|ContainerInterface
    {
        global $container;
        if ($container === null) {
            return null;
        }
        $interfaces = \Safe\class_implements($container);
        if (!array_key_exists('Psr\Container\ContainerInterface', $interfaces)) {
            return null;
        }

        return $container;
    }
}
