<?php

declare(strict_types=1);

if (!function_exists('app')) {
    function app(string $name = ''): mixed
    {
        $container = \Kaiseki\LaravelHelperMocks\Helper::getContainer();
        if ($container === null) {
            return null;
        }
        if ($name === '') {
            return $container;
        }
        return $container->get($name);
    }
}

if (!function_exists('resolve')) {
    function resolve(string $name = ''): mixed
    {
        return app($name);
    }
}

if (!function_exists('config')) {
    function config(string $path = ''): mixed
    {
        $container = \Kaiseki\LaravelHelperMocks\Helper::getContainer();
        if ($container === null) {
            return null;
        }
        $config = \Kaiseki\Config\Config::fromContainer($container);
        $current = $config->array('laravel');
        $paths = explode('.', $path);
        foreach ($paths as $index) {
            if (
                !is_array($current)
                || !array_key_exists($index, $current)
            ) {
                return null;
            }
            $current = $current[$index];
        }
        return $current;
    }
}
