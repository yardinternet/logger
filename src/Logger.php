<?php

declare(strict_types=1);

namespace Yard\Logging;

use Psr\Log\LoggerInterface;

/**
 * Default logger based on the error_log() function.
 */
class Logger implements LoggerInterface
{
	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function emergency($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function alert($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function critical($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function error($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function warning($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function notice($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function info($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function debug($message, array $context = []): void
	{
		error_log((string)$message, 4);
	}

	/**
	 * @param mixed $level
	 * @param string $message
	 * @param array<mixed,mixed> $context
	 *
	 * @return void
	 */
	public function log($level, $message, array $context = []): void
	{
		error_log((string)$message, 4);
	}
}
