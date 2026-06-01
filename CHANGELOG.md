# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-06-01

First tagged release.

### Added

- Global `app()`, `resolve()` and `config()` helper mocks (in `inc/functions.php`) backed by a PSR-11
  container read from the global `$container`, plus `Helper::getContainer()`.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11 schema, composer-require-checker 4) and depend
  on `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config; `kaiseki/config` pinned to
  `^2.0`. CI now runs via the reusable workflow in `kaisekidev/.github`.

### Fixed

- PHPStan 2 (level max): `Helper::getContainer()` now narrows the global `$container` with
  `instanceof ContainerInterface` instead of `class_implements()`, dropping the mixed-type findings.
  Behaviour is unchanged (the container is returned only when it is a PSR container).
