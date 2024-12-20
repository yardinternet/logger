# Replaceable PSR-3 Logger

[![Code Style](https://github.com/yardinternet/logger/actions/workflows/format-php.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/format-php.yml)
[![PHPStan](https://github.com/yardinternet/logger/actions/workflows/phpstan.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/phpstan.yml)
[![Tests](https://github.com/yardinternet/logger/actions/workflows/run-tests.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/run-tests.yml)
[![Code Coverage Badge](https://github.com/yardinternet/logger/blob/badges/coverage.svg)](https://github.com/yardinternet/logger/actions/workflows/badges.yml)
[![Lines of Code Badge](https://github.com/yardinternet/logger/blob/badges/lines-of-code.svg)](https://github.com/yardinternet/logger/actions/workflows/badges.yml)

Composer package that provides a very basic PSR-3 logger. This logger is just a wrapper around PHP function `error_log()`.
As such it does not have any requirements other than `psr/log`. It is meant to be used in PHP environments that might not
feature a DI container, like WordPress.

The provided logger is actually meant as a temporary stub. The most prominent feature of this package is that the logger
can be replaced by any another PSR-3 logger. This allows projects to push a single logger to its dependencies and achieve
consistent log handling.

## Installation

To install this package using Composer, follow these steps:

1. Add the following to the `repositories` section of your `composer.json`:

    ```json
    {
      "type": "vcs",
      "url": "git@github.com:yardinternet/logger.git"
    }
    ```

2. Install this package with Composer:

    ```sh
    composer require yard/logger
    ```

## Usage

Simply use the static `Log` facade:

```php
Log::error('Whoops.');
```

Or get the PSR-3 logger instance from it:

```php
$logger = Log::getLogger();
```

Projects that wish to replace the logger instance can use the static `setLogger()` method, like this:

```php
Log::setLogger(app()->make('log'));
```

### WordPress

When using the logger in WordPress themes, the above replacement method is not recommended, due to the practise of vendor prefixing. The recommended method to replace the logger from a WordPress theme is to:

1. Use `do_action()` in WordPress themes to pass the desired logger to any plugins
2. Use `add_action()` in WordPress plugins to receive a logger instance and set it.

The `Log` class provides the `WP_ACTION_SET_LOGGER` constant, which contains the name of the WordPress action that should be used. Hooking into the action should look like:

```php
add_action(Yard\Logging\Log::WP_ACTION_SET_LOGGER, Log::setLogger(...));
```

An [Acorn](https://roots.io/acorn/) based WordPress theme for example could push its Laravel logger like this:

```php
do_action(Yard\Logging\Log::WP_ACTION_SET_LOGGER, app()->make('log'));
```
