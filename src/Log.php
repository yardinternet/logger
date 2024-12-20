<?php

declare(strict_types=1);

namespace Yard\Logging;

use Psr\Log\LoggerInterface;

abstract class Log
{
	public const WP_ACTION_SET_LOGGER = 'yard::logger/set';
	private static LoggerInterface $logger;

	public static function getLogger(): LoggerInterface
	{
		if (! isset(self::$logger)) {
			self::$logger = new Logger();
		}

		return self::$logger;
	}

	public static function setLogger(LoggerInterface $logger): void
	{
		self::$logger = $logger;
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function emergency(string $message, array $context = []): void
	{
		self::getLogger()->emergency($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function alert(string $message, array $context = []): void
	{
		self::getLogger()->alert($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function critical(string $message, array $context = []): void
	{
		self::getLogger()->critical($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function error(string $message, array $context = []): void
	{
		self::getLogger()->error($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function warning(string $message, array $context = []): void
	{
		self::getLogger()->warning($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function notice(string $message, array $context = []): void
	{
		self::getLogger()->notice($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function info(string $message, array $context = []): void
	{
		self::getLogger()->info($message, $context);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function debug(string $message, array $context = []): void
	{
		self::getLogger()->debug($message, $context);
	}

	/**
	 * @param mixed $level
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public static function log($level, string $message, array $context = []): void
	{
		self::getLogger()->log($level, $message, $context);
	}
}
