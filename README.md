# Replaceable PSR-3 Logger

[![Code Style](https://github.com/yardinternet/logger/actions/workflows/format-php.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/format-php.yml)
[![PHPStan](https://github.com/yardinternet/logger/actions/workflows/phpstan.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/phpstan.yml)
[![Tests](https://github.com/yardinternet/logger/actions/workflows/run-tests.yml/badge.svg?no-cache)](https://github.com/yardinternet/logger/actions/workflows/run-tests.yml)
[![Code Coverage Badge](https://github.com/yardinternet/logger/blob/badges/coverage.svg)](https://github.com/yardinternet/logger/actions/workflows/badges.yml)
[![Lines of Code Badge](https://github.com/yardinternet/logger/blob/badges/lines-of-code.svg)](https://github.com/yardinternet/logger/actions/workflows/badges.yml)

Composer package that provides a very basic PSR-3 logger. This logger is just a wrapper around PHP function `error_log()`. As such it does not have any requirements other than `psr/log`. It is meant to be used in PHP environments that might not feature a DI container, like WordPress. 

The provided logger is actually meant as a temporary stub. The most prominent feature of this package is that the logger can be replaced by any another PSR-3 logger. This allows projects to push a single logger to its dependencies and achieve consistent log handling.

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

Projects that wish to replace the logger instance can use the static `setLogger()` method. For example, an [Acorn](https://roots.io/acorn/) project could push the Laravel logger like this:

```php
Log::setLogger(app()->make('log'));
```
