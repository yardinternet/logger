<?php

declare(strict_types=1);

namespace Yard\src\Tests;

use Psr\Log\LoggerInterface;
use Yard\Logging\Log;

it('can get the default logger', function () {
	expect(Log::getLogger())->toBeInstanceOf(LoggerInterface::class);
});
