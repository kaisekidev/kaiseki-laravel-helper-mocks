# kaiseki/laravel-helper-mocks

Mock Laravel helper functions so packages that depend on them can run in non-Laravel projects.

Provides minimal global `app()`, `resolve()` and `config()` functions backed by a PSR-11 container
(read from the global `$container`), so code written against Laravel's helpers works without pulling
in the Laravel framework.

## Installation

```bash
composer require kaiseki/laravel-helper-mocks
```

Requires PHP 8.2 or newer.

## Usage

The helpers resolve services from a PSR-11 container exposed as the global `$container`. Assign it
once during bootstrap:

```php
use Psr\Container\ContainerInterface;

/** @var ContainerInterface $myContainer */
global $container;
$container = $myContainer;
```

The mocked helpers are then available globally:

```php
$container = app();                 // the container itself
$service   = app(MyService::class); // a service resolved from the container
$same      = resolve(MyService::class);
$value     = config('some.config.key');
```

- [`app()`](https://laravel.com/docs/helpers#method-app) — returns the container, or a service from
  it when given an id; `null` if no PSR container is set.
- [`resolve()`](https://laravel.com/docs/helpers#method-resolve) — alias of `app()`.
- [`config()`](https://laravel.com/docs/helpers#method-config) — reads a key through
  `kaiseki/config` (`Config::softGet()`), returning `null` when unset.

Each function is declared behind a `function_exists()` guard, so it yields to a real Laravel
installation if one is present.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
